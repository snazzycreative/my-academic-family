<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip;');
    // return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});

add_filter( 'excerpt_length', __NAMESPACE__ . '\\excerpt_length', 999 );
function excerpt_length( $length ) {
    return 20;
}

add_filter( 'post_class', __NAMESPACE__ . '\\rewrite_post_class', 10, 3 );
function rewrite_post_class( $classes, $class, $post_id ) {
    $postType = get_post_type($post_id);

    if($index = array_search($postType, $classes)) unset($classes[$index]);
    if($index = array_search('type-' . $postType, $classes)) unset($classes[$index]);

    if($postType) $classes[] = $postType . '-content';

    return $classes;
}

add_action('wp_head', function(){
    echo view('partials.favicons')->render();
});
