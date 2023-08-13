<?php

namespace App\acf;

add_filter('acf/settings/save_json', __NAMESPACE__ . '\\save');
add_filter('acf/settings/load_json', __NAMESPACE__ . '\\load');

function save( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
}

function load( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
}
