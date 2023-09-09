<?php

namespace App\achives;
use App;

add_action( 'pre_get_posts', __NAMESPACE__ . '\\modify_query' );
function modify_query( $query ) {

	if(  !is_admin() && $query->is_main_query()):

        if(is_post_type_archive('event')):
            $pastArgs = App\pastArgs('event');
            $upcomingArgs = App\upcomingArgs('event');
            $upcomingArgs['fields'] = 'ids';

            // $upcoming = get_posts($upcomingArgs);

            foreach([
                'meta_key',
                'orderby',
                'order',
                'meta_query',
            ] as $key):
                $query->set($key, $pastArgs[$key]);
            endforeach;

            // $query->set('exclude', $upcoming);

        endif;

    endif;
}
