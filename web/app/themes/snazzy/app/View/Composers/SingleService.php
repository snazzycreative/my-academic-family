<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App;

class SingleService extends Composer
{
    public function override()
    {
        $facilitators = get_field('snazzy_service_team');

        $args = ($facilitators) ? [
            'post_type' => 'team',
            'posts__in' => $facilitators,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        ] : null;

        return [
            'team_args' => $args,
        ];
    }
}
