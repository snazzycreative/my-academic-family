<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;
    $postType = 'team';

	register_extended_post_type(
        $postType,
        [
            'labels' => [
                'featured_image' => __('Portrait', $td),
                'menu_name' => __('Team', $td),
                'all_items' => __('All Members', $td),
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
            'menu_icon' => 'dashicons-admin-users',
            'rewrite' => [
                'slug' => 'about/team',
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
