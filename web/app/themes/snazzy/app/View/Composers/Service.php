<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App;

class Service extends Composer
{
    protected static $views = [
        'partials.content-service',
        'sections.banner.banner-service',
        'single-service',
    ];

    public function with()
    {
        $ID = get_the_ID();

        $props = App\background_settings('snazzy_banner');
        $bgClasses = App\bgClasses($props, true);
        $pricing = get_field('snazzy_stripe_embeds');
        $facilitators = get_field('snazzy_service_team');

        $readMore = [
            'link' => [
                'url' => get_the_permalink(),
                'title' => __('Read More', 'sage'),
                'target' => null,
            ],
            'colour' => 'default',
            'style' => 'outline',
        ];

        $bookNow = [
            'link' => [
                'url' => '#',
                'title' => __('Book Now', 'sage'),
                'target' => null,
            ],
        ];

        return [
            'image' => get_post_thumbnail_id(),
            'bgClasses' => $bgClasses,
            'pricing' => $pricing,
            'facilitators' => $facilitators,
            'links' => [
                $readMore,
                $bookNow,
            ],
        ];
    }
}
