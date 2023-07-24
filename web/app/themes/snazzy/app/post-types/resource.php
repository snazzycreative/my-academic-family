<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;

    $postType = 'resource';

    $options = [
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'thumbnail',
        ],
        'menu_position' => 20,
        'menu_icon' => 'dashicons-share-alt',
        'rewrite' => [
            'slug' => 'student-resources',
        ],
        'has_archive' => true,
        'capability_type' => 'post',
        'admin_cols' => [
            'primary_type' => [
                'title' => __('Primary Type', $td),
                'meta_key' => '_primary_term_resource_type',
                'function' => function(){
                    $termID = get_post_meta(get_the_ID(), '_primary_term_resource_type', true);
                    $term = get_term_by('term_id', $termID, 'resource_type');

                    if($termID): ?>

                        <a href="<?= admin_url('term.php?taxonomy=resource_type&tag_ID='.$termID.'&post_type=resource') ?>"><?= $term->name ?></a>

                    <?php endif;

                },
            ],
            'resource_type' => [
                'title' => __('Types', $td),
                'taxonomy' => 'resource_type',
            ],
            'resource_tag' => [
                'title' => __('Tags', $td),
                'taxonomy' => 'resource_tag',
            ],
        ],
    ];

	register_extended_post_type($postType, $options);

    register_extended_taxonomy(
        'resource_type',
        $postType,
        [
            'meta_box' => 'simple',
        ],
        [
            'singular' => __('Type', $td),
            'plural' => __('Types', $td),
            'slug' => 'student-resource-types',
        ]
    );

    register_extended_taxonomy(
        'resource_tag',
        $postType,
        [
            // 'meta_box' => 'simple',
        ],
        [
            'singular' => __('Tag', $td),
            'plural' => __('Tags', $td),
            'slug' => 'student-resource-tags',
        ]
    );
} );
