<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;

    $postType = 'faq';

    $options = [
        'supports' => [
            'title',
            'editor',
            'page-attributes',
        ],
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-comments',
        'rewrite' => false,
        'has_archive' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'capability_type' => 'post',
        'admin_cols' => [
            'faq_audience' => [
                'title' => __('Audience', $td),
                'taxonomy' => 'faq_audience',
            ],
        ],
    ];

	register_extended_post_type(
        $postType,
        $options,
        [
            'plural' => __('FAQs', $td),
            'singular' => __('FAQ', $td),
        ],
    );

    register_extended_taxonomy(
        'faq_audience',
        $postType,
        [
            'meta_box' => 'simple',
            'labels' => [
                'menu_name' => __('Audience', $td),
            ]
        ],
        [
            'singular' => __('Audience', $td),
            'plural' => __('Audiences', $td),
            'slug' => 'frequently-asked-questions/audience',
        ]
    );
} );
