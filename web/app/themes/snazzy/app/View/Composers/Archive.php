<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use snazzycp\utilities;
use App;

class Archive extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'archive',
        'archive-*',
    ];

    public function with()
    {
        $upcomingQuery = new \WP_Query($this->upcomingQuery(get_post_type()));

        return [
            'upcomingQuery' => $upcomingQuery,
        ];
    }

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        $archiveObject = utilities\archiveObject(get_post_type());



        return [
            'post' => $archiveObject,
            'isPagebuilder' => App\isPagebuilder(@$archiveObject->ID),
        ];
    }

    public function upcomingQuery($postType = null)
    {
        if(is_null($postType)) return false;
        $now = wp_date('Y-m-d H:i:s');

        return [
            'post_type' => $postType,
            'meta_key' => 'snazzy_timestamp_end',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key'     => 'snazzy_timestamp_start',
                    'value'   => $now,
                    'compare' => '>=',
                    'type'    => 'DATETIME',
                ],
                [
                    'key'     => 'snazzy_timestamp_end',
                    'value'   => $now,
                    'compare' => '>=',
                    'type'    => 'DATETIME',
                ],
            ],
        ];
    }
}
