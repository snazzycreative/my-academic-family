<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;
    $postType = 'mentor';

	register_extended_post_type(
        $postType,
        [
            'labels' => [
                'featured_image' => __('Portrait', $td),
            ],
            'supports' => [
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'page-attributes',
                'social-channels',
            ],
            'menu_position' => 20,
            'menu_icon' => 'dashicons-groups',
            'rewrite' => [
                'slug' => 'about/mentors',
            ],
            'has_archive' => true,
            'capability_type' => 'post',
            'taxonomies' => [
                'post_tag',
            ],
            'admin_cols' => [
                'mentor_tag' => [
                    'title' => __('Tags', $td),
                    'taxonomy' => 'post_tag',
                ],
            ],
        ],
    );
} );
