<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;
    $postType = 'mentor';

	register_extended_post_type(
        $postType,
        [
            'menu_position' => 27,
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
                'color-controls',
            ],
            'menu_icon' => 'dashicons-groups',
            'rewrite' => [
                'slug' => 'mentorship-programme/volunteer-mentors',
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
