<?php

namespace App;
use snazzycp\frontend;
use snazzycp\utilities;
use snazzycp\data;

function knockout_content($layout = null)
{
    $layouts = [
        'wysiwyg',
    ];

    if(in_array($layout, $layouts)):
        return true;
    else:
        return false;
    endif;
}

function colour_name_to_hex($colour = null, $tint = null)
{
    if(!$colour) return false;

    if($colour == 'black'):
        $hex = '#000000';
    elseif($colour == 'white'):
        $hex = '#FFFFFF';
    else:
        $hex = frontend\snazzycp_info('color_' . $colour);
    endif;

    if($tint):
        $tints = data\colour_tints();
        $hex = utilities\adjustBrightness($hex, $tints[$tint]);
    endif;

    return $hex;
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
        'color' => 'default',
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
        $hex = colour_name_to_hex($colour, $tint);

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

    if($pattern) $classes[] = 'bg-pattern';

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
        'total' => 5,
    ];

    $args = wp_parse_args($args, $default_args);
    $total = $args['total'];
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

    if($total < 5) $multipliers = array_slice($multipliers, $total);

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
        'section-small',
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
