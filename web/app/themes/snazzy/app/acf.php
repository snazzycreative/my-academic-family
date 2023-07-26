<?php

namespace App;

add_filter('acf/settings/save_json', __NAMESPACE__ . '\\acf_save_json');
add_filter('acf/settings/load_json', __NAMESPACE__ . '\\acf_load_json');

function acf_save_json( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/app/acf';

    // return
    return $path;

}

function acf_load_json( $paths ) {

    // remove original path (optional)
    unset($paths[0]);

    // append path
    $paths[] = get_stylesheet_directory() . '/app/acf';

    // return
    return $paths;

}
