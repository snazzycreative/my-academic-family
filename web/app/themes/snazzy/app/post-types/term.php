<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;
    $postType = 'term';

	register_extended_post_type(
        $postType,
        [
            'menu_position' => 24,
            'labels' => [
                'menu_name' => __('Encyclopedia', $td),
                'all_items' => __('All Terms', $td),
                'featured_image' => __('Background Image', $td),
            ],
            'supports' => [
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'color-controls',
            ],
            'menu_icon' => 'dashicons-book-alt',
            'taxonomies' => [
                'post_tag',
            ],
            'rewrite' => [
                'slug' => 'encyclopedia-of-university',
            ],
            'has_archive' => true,
            'capability_type' => 'post',
            'admin_cols' => [
                'term_tag' => [
                    'title' => __('Tags', $td),
                    'taxonomy' => 'post_tag',
                ],
            ],
        ],
        [
            'singular' => __('Encyclopedia Term', $td),
            'plural' => __('Encyclopedia Terms', $td),
        ]
    );
} );
