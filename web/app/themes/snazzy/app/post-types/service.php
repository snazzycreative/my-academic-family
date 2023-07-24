<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;

    $postType = 'service';

    $options = [
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'thumbnail',
        ],
        'menu_position' => 20,
        'menu_icon' => 'dashicons-editor-table',
        'taxonomies' => [
            'post_tag',
        ],
        'rewrite' => [
            'slug' => 'services',
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