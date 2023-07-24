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
        'rewrite' => [
            'slug' => 'services',
        ],
        'has_archive' => false,
        'capability_type' => 'post',
    ];

	register_extended_post_type( $postType, $options );
} );
