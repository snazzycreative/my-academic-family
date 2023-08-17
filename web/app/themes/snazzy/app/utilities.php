<?php

namespace App;

function background_settings($prefix = null, $id = null)
{
    if(is_null($id)) $id = get_the_ID();
    if($prefix) $prefix .= '_';

    $props = get_field($prefix . 'background', $id);

    return $props;
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
