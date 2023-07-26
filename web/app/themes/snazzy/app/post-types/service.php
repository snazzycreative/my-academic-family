<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;
    $postType = 'service';

    $options = [
        'menu_position' => 21,
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'page-attributes',
            'color-controls',
        ],
        'menu_icon' => 'dashicons-editor-table',
        'taxonomies' => [
            'post_tag',
        ],
        'labels' => [
            'featured_image' => __('Social Preview', $td),
        ],
        'rewrite' => [
            'slug' => 'coaching-services',
        ],
        'has_archive' => false,
        'capability_type' => 'post',
        'admin_cols' => [
            'service_tag' => [
                'title' => __('Tags', $td),
                'taxonomy' => 'post_tag',
            ],
        ]
    ];

	register_extended_post_type( $postType, $options );
} );
