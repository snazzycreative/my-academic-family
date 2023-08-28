<?php

namespace App;
use snazzycp\frontend;
use snazzycp\utilities;

function knockout_content($layout = null)
{
    $layouts = [
        'wysiwyg',
        'alternating',
        'form',
        'organisations',
    ];

    if(in_array($layout, $layouts)):
        return true;
    else:
        return false;
    endif;
}

function background_settings($prefix = null, $id = null)
{
    if(is_null($id)) $id = get_the_ID();
    if($prefix) $prefix .= '_';

    $props = get_field($prefix . 'background', $id);

    return $props;
}

function is_knockout($hex = '#FFFFFF', $contrast = 0)
{
    $knockout = utilities\high_contrast($hex);

    if($contrast == 'light'):
        return true;
    elseif(!$contrast && $knockout):
        return true;
    else:
        return false;
    endif;
}

function bgClasses($args = [], $knockoutContent = false)
{
    $defaultArgs = [
        'colour' => 'default',
        'tint' => null,
        'pattern' => false,
        'contrast' => false,
    ];

    $args = wp_parse_args($args, $defaultArgs);

    $colour = @$args['colour'];
    $tint = @$args['tint'];
    $pattern = @$args['pattern'];
    $contrast = @$args['contrast'];

    $classes = [];

    if($colour):
        $hex = utilities\colour_name_to_hex($colour, $tint);

        if($colour && $tint && !in_array($colour, ['white', 'black'])):
            $classes[] = 'bg-' . $colour . '-' . $tint;
        elseif($colour):
            $classes[] = 'bg-' . $colour;
        endif;

        if($knockoutContent && is_knockout($hex, $contrast)):
            $classes[] = 'knockout';
        endif;

    else:
        $classes[] = 'bg-default';
    endif;

    if($pattern) $classes[] = (is_knockout(@$hex, $contrast)) ? 'bg-pattern bg-pattern-white' : 'bg-pattern bg-pattern-black';

    return $classes;
}

function buttonClasses($args = [])
{
    $default_args = [
        'colour' => null,
        'style' => null,
    ];

    $args = wp_parse_args($args, $default_args);

    $classes = [
        'button',
    ];

    if($args['colour']) $classes[] = $args['colour'];
    if($args['style']) $classes[] = $args['style'];

    return $classes;
}

function add_image_srcset($args = [])
{
    $default_args = [
        'name' => 'hero',
        'width' => 1920,
        'height' => null,
        'crop' => true,
        'sizes' => 5,
    ];

    $args = wp_parse_args($args, $default_args);
    $sizes = $args['sizes'];
    $width = $args['width'];
    $height = $args['height'];

    if(is_null($height)) $height = $width;

    $multipliers = [
        'xl' => 1,
        'lg' => 0.75,
        'md' => 0.52083333,
        'sm' => 0.33333333,
        'xs' => 0.20833333,
    ];

    if($sizes < 5) $multipliers = array_slice($multipliers, 0, $sizes);

    foreach ( $multipliers as $slug => $scale ):
        add_image_size (
            $args['name'] . '-' . $slug,
            round((int)$width * $scale),
            round((int)$height * $scale),
            $args['crop']
        );
    endforeach;
}

function section_classes($section = [])
{
    $classes = [
        'section',
        'section-' . @$section['acf_fc_layout'],
        'section-pagebuilder',
    ];

    if(@$section['padding_top'] == 'none') $classes[] = 'section-zero-top';
    if(@$section['padding_bottom'] == 'none') $classes[] = 'section-zero-bottom';

    return $classes;
}

function section_intro_footer_classes($args = [], $section = null)
{
    $default_args = [
        'alignment' => 'centre',
        'width' => 'small',
    ];

    $align = @$args['alignment'] ?: 'centre';
    $width = @$args['width'] ?: 'small';

    $args = wp_parse_args($args, $default_args);

    $classes = [
        'section',
        'section-' . $section,
        'container',
        'container-' . $width,
        'align-' . $align,
    ];

    return $classes;
}

function section_container_classes($args = [])
{
    $default_args = [
        'container' => null,
    ];

    $args = wp_parse_args($args, $default_args);

    $classes = [
        'container',
    ];

    if($args['container']) $classes[] = 'container-' . $args['container'];

    return $classes;
}

function postgrid_args($section = null)
{
    if(is_null($section)) return false;

    $postType = @$section['post_type'];
    $IDs = @$section['select_' . $postType];
    $source = @$section['source'];
    $status = @$section['status'];
    $type = @$section['type'];
    $grid = @$section['grid'];

    $args = [
        'post_type' => $postType,
        'post_status' => 'publish',
        'posts_per_page' => $grid ?: 3,
    ];

    $now = date('YmdHis');

    if(!$source && $type && @$taxonomy[$postType]):
    $args['tax_query'] = [
        [
        'taxonomy' => @$taxonomy[$postType],
        'terms' => $type,
        'field' => 'term_id',
        'operator' => 'IN',
        ],
    ];
    endif;

    if(!$source && $status == 'upcomingx' && $postType == 'event'):
        $args['meta_key'] = 'snazzy_date_start';
        $args['orderby'] = 'meta_value';
        $args['meta_query'] = [
            'relation' => 'OR',
            [
                'key' => 'snazzy_timestamp_start',
                'value' => $now,
                'compare' => '>=',
                'type' => 'DATE',
            ],
            [
                'key' => 'snazzy_timestamp_end',
                'value' => $now,
                'compare' => '>=',
                'type' => 'DATE',
            ],
        ];
    endif;

    if(!$source && $status == 'pastx' && $postType == 'event'):
        $args['meta_key'] = 'snazzy_date_end';
        $args['orderby'] = 'meta_value';
        $args['order'] = 'DESC';
        $args['meta_query'] = [
            [
                'key' => 'snazzy_timestamp_end',
                'value' => $now,
                'compare' => '>=',
                'type' => 'DATE',
            ],
        ];
    endif;

    if($IDs && $source == 'specific') $args['posts__in'] = $IDs;

    return $args;
}
