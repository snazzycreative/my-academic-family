<?php

add_action( 'init', function() {
    $postType = 'slide';
    $td = SNAZZY_PREFIX;

    $options = [
        'labels' => [
            'featured_image' => __('Banner Image', $td),
        ],
        'supports' => [
            'title',
            'excerpt',
            'thumbnail',
            'color-controls',
            'link',
        ],
        'menu_icon' => 'dashicons-slides',
        'rewrite' => false,
        'has_archive' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'menu_position' => 10,
    ];

	register_extended_post_type( $postType, $options );
} );
