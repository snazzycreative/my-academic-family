<?php

namespace App\achives;

add_action( 'pre_get_posts', __NAMESPACE__ . '\\modify_query' );
function modify_query( $query ) {

	if(
        !is_admin() &&
        $query->is_main_query() &&
        $query->is_post_type_archive('event')
    ):

        $now = wp_date('Y-m-d H:i:s');

        $meta_query = [
            'relation' => 'AND',
            [
                'key'     => 'snazzy_timestamp_start',
                'value'   => $now,
                'compare' => '<',
                'type'    => 'DATETIME',
            ],
            [
                'key'     => 'snazzy_timestamp_end',
                'value'   => $now,
                'compare' => '<',
                'type'    => 'DATETIME',
            ],
        ];

        $query->set('meta_key', 'snazzy_timestamp_end');
        $query->set('orderby', 'meta_value');
        $query->set('order', 'DESC');
        $query->set('meta_query', $meta_query);

    endif;
}
