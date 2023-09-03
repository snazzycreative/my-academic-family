<?php

add_action( 'init', function() {
    $postType = 'slide';
    $td = SNAZZY_PREFIX;

	register_extended_post_type(
        $postType,
        [
            'menu_position' => 10,
            'labels' => [
                'featured_image' => __('Background Image', $td),
            ],
            'supports' => [
                'title',
                'excerpt',
                'thumbnail',
                'page-attributes',
            ],
            'menu_icon' => 'dashicons-slides',
            'rewrite' => false,
            'has_archive' => false,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'show_in_nav_menus' => false,
        ],
    );
} );
