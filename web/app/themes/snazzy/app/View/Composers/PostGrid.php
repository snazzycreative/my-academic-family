<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PostGrid extends Composer
{
    protected static $views = [
        'sections.postgrid.postgrid',
    ];

    public function with()
    {
        return [
            'taxonomy' => [
                'event' => 'event_type',
                'resource' => 'resource_type',
            ],
        ];
    }
}
