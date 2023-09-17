<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;

    $postType = 'faq';

    $options = [
        'menu_position' => 25,
        'supports' => [
            'title',
            'editor',
            'page-attributes',
        ],
        'menu_icon' => 'dashicons-admin-comments',
        'rewrite' => [
            'slug' => 'faqs',
        ],
        'has_archive' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'capability_type' => 'page',
        'show_in_nav_menus' => false,
        'taxonomies' => [
            'post_tag',
        ],
        'admin_cols' => [
            'faq_audience' => [
                'title' => __('Audience', $td),
                'taxonomy' => 'faq_audience',
            ],
            'faq_tag' => [
                'title' => __('Tags', $td),
                'taxonomy' => 'post_tag',
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
