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
        $postType = @get_queried_object()->name;
        $upcomingQuery = new \WP_Query($this->upcomingQuery($postType));

        $postTypeColours = [
            'mentor' => 'default',
        ];

        $bgClasses = App\bgClasses([
            'colour' => @$postTypeColours[$postType] ?: 'primary',
            'tint' => null,
            'pattern' => true,
            'contrast' => false,
        ]);

        return [
            'upcomingQuery' => $upcomingQuery,
            'bgClasses' => $bgClasses,
        ];
    }

    public function upcomingQuery($postType = null)
    {
        if(is_null($postType)) return false;
        $now = wp_date('Y-m-d H:i:s');

        return App\upcomingArgs($postType);
    }
}
