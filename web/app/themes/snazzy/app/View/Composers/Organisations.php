<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Organisations extends Composer
{
    protected static $views = [
        'sections.organisations.organisations',
    ];

    public function with()
    {
        return [
            'args' => [
                'post_type' => 'organisation',
                'orderby' => 'menu_order title',
                'order' => 'ASC',
                'posts_per_page' => -1,
            ],
            'tax_query' => [
                'taxonomy' => 'organisation_relationship',
                'field' => 'term_id',
                'operator' => 'IN',
            ],
        ];
    }
}
