<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;

    $postType = 'team';

    $options = [
        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
        ],
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-users',
        'rewrite' => [
            'slug' => 'about',
        ],
        'has_archive' => false,
        'capability_type' => 'post',
        'labels' => [
            'menu_name' => __('Team', $td),
            'all_items' => __('All Members', $td),
        ],
    ];

	register_extended_post_type(
        $postType,
        $options,
        [
            'plural' => __('Team Members', $td),
            'singular' => __('Team Member', $td),
        ],
    );
} );
