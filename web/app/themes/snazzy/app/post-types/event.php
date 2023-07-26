<?php

add_action( 'init', function() {
    $td = SNAZZY_PREFIX;

    $postType = 'event';

    $options = [
        'menu_position' => 22,
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'link',
            'social-channels',
        ],
        'menu_icon' => 'dashicons-calendar-alt',
        'taxonomies' => [
            'post_tag',
        ],
        'rewrite' => [
            'slug' => 'events',
        ],
        'has_archive' => true,
        'capability_type' => 'post',
        'admin_cols' => [
            // 'start_datetime' => [
            //     'title' => __('Start Time', $td),
            //     'meta_key' => 'snazzy_date_start',
            //     'date_format' => 'F j, Y g:i a',
            // ],
            // 'end_datetime' => [
            //     'title' => __('End Time', $td),
            //     'meta_key' => 'snazzy_date_end',
            //     'date_format' => 'F j, Y g:i a',
            //     'default' => 'ASC',
            // ],
            'primary_type' => [
                'title' => __('Primary Type', $td),
                'meta_key' => '_primary_term_event_type',
                'function' => function(){
                    $termID = get_post_meta(get_the_ID(), '_primary_term_event_type', true);
                    $term = get_term_by('term_id', $termID, 'event_type');

                    if($termID): ?>

                        <a href="<?= admin_url('term.php?taxonomy=event_type&tag_ID='.$termID.'&post_type=event') ?>"><?= $term->name ?></a>

                    <?php endif;

                },
            ],
            'event_type' => [
                'title' => __('Types', $td),
                'taxonomy' => 'event_type',
            ],
            'event_tag' => [
                'title' => __('Tags', $td),
                'taxonomy' => 'post_tag',
            ],
        ],
    ];

	register_extended_post_type( $postType, $options );

    register_extended_taxonomy(
        'event_type',
        $postType,
        [
            'meta_box' => 'simple',
        ],
        [
            'singular' => __('Type', $td),
            'plural' => __('Types', $td),
            'slug' => 'event-types',
        ]
    );
} );
