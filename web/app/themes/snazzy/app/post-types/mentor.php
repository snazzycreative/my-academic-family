<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;

    $postType = 'mentor';

    $options = [
        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
        ],
        'menu_position' => 20,
        'menu_icon' => 'dashicons-groups',
        'rewrite' => [
            'slug' => 'about',
        ],
        'has_archive' => false,
        'capability_type' => 'post',
    ];

	register_extended_post_type(
        $postType,
        $options,
    );
} );
