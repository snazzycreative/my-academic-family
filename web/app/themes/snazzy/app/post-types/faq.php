<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;

    $postType = 'faq';

    $options = [
        'supports' => [
            'title',
            'editor',
        ],
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-comments',
        'rewrite' => false,
        'has_archive' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'capability_type' => 'post',
    ];

	register_extended_post_type(
        $postType,
        $options,
        [
            'plural' => __('FAQs', $td),
            'singular' => __('FAQ', $td),
        ],
    );
} );
