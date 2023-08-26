<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use snazzycp\utilities;

class Organisation extends Composer
{
    protected static $views = [
        'partials.content-organisation',
    ];

    public function with()
    {
        return [
            'link' => utilities\get_link(),
            'logo' => get_post_thumbnail_id(),
        ];
    }
}
