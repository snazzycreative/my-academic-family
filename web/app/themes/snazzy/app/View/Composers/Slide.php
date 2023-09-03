<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App;

class Slide extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.slides.slide',
    ];

    public function with()
    {
        $slideClasses = [
            'banner',
            'banner-slide',
        ];

        $image = get_post_thumbnail_id();
        $video = get_field('snazzy_background_video');

        if($image || $video) $slideClasses[] = 'has-image';
        if($image && $video) $video['poster'] = wp_get_attachment_image_src($image, 'hero-xl')[0];

        $props = App\background_settings();
        $bgClasses = App\bgClasses($props, true);

        $slideClasses = array_merge($slideClasses, $bgClasses);

        return [
            'slide_classes' => $slideClasses,
            'heading_scale' => get_field('heading_scale') ?: 1,
            'buttons' => get_field('snazzy_links'),
            'image' => $image,
            'video' => $video,
            'opacity' => get_field('snazzy_background_opacity') * 0.01 ?: 0.3,
        ];
    }
}
