<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App;

class SingleService extends Composer
{
    protected static $views = [
        'single-service',
    ];

    public function with()
    {
        $ID = get_the_ID();

        $facilitators = get_field('snazzy_service_team');

        $team = new \WP_Query([
            'post_type' => 'team',
            'posts__in' => $facilitators,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ]);

        return [
            'facilitators' => $team,
        ];
    }
}
