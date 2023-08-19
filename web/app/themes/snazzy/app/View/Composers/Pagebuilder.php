<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class PageBuilder extends Composer
{
    protected static $views = [
        'template-pagebuilder',
    ];

    public function with()
    {
        return [
            'sections' => get_field('snazzy_pagebuilder'),
            'x' => 1,
        ];
    }
}
