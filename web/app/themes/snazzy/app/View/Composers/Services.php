<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Services extends Composer
{
    protected static $views = [
        'sections.services.services',
    ];

    public function with()
    {
        return [
            'args' => [
                'post_type' => 'service',
                'orderby' => 'menu_order title',
                'order' => 'ASC',
                'posts_per_page' => -1,
            ],
        ];
    }
}
