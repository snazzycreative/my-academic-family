<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;
    $postType = 'team';

	register_extended_post_type(
        $postType,
        [
            'menu_position' => 26,
            'labels' => [
                'featured_image' => __('Portrait', $td),
                'menu_name' => __('Team', $td),
                'all_items' => __('All Members', $td),
            ],
            'supports' => [
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'page-attributes',
                'social-channels',
                'color-controls',
            ],
            'menu_icon' => 'dashicons-admin-users',
            'rewrite' => [
                'slug' => 'about',
            ],
            'has_archive' => false,
            'capability_type' => 'post',
        ],
        [
            'plural' => __('Team Members', $td),
            'singular' => __('Team Member', $td),
        ],
    );
} );
