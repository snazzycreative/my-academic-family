<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;
    $postType = 'organisation';

	register_extended_post_type(
        $postType,
        [
            'labels' => [
                'featured_image' => __('Logo', $td),
            ],
            'supports' => [
                'title',
                'page-attributes',
                'thumbnail',
                'social-channels',#
                'link',
            ],
            'menu_position' => 20,
            'menu_icon' => 'dashicons-building',
            'rewrite' => false,
            'has_archive' => false,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'capability_type' => 'post',
            'admin_cols' => [
                'organisation_relationship' => [
                    'title' => __('Relationship', $td),
                    'taxonomy' => 'organisation_relationship',
                ],
            ],
        ],
    );

    register_extended_taxonomy(
        'organisation_relationship',
        $postType,
        [
            'meta_box' => 'radio',
            'rewrite' => false,
            'publicly_queryable' => false,
        ],
        [
            'singular' => __('Relationship', $td),
            'plural' => __('Relationships', $td),
        ]
    );
} );
