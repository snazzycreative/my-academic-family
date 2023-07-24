<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;

    $postType = 'term';

    $options = [
        'labels' => [
            'menu_name' => __('Encyclopedia', $td),
        ],
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'thumbnail',
        ],
        'menu_position' => 20,
        'menu_icon' => 'dashicons-book-alt',
        'taxonomies' => [
            'post_tag',
        ],
        'rewrite' => [
            'slug' => 'student-resources/encyclopedia',
        ],
        'has_archive' => true,
        'capability_type' => 'post',
        'admin_cols' => [
            'term_tag' => [
                'title' => __('Tags', $td),
                'taxonomy' => 'post_tag',
            ],
        ],
    ];

	register_extended_post_type($postType, $options);
} );
