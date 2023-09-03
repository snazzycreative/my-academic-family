<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Slides extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'sections.slides.slides',
    ];

    public function with()
    {
        $slides = new \WP_Query([
            'post_type' => 'slide',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'posts_per_page' => 4,
        ]);

        return [
            'slides' => $slides,
            'count' => @$slides->found_posts - 1 ?: 0,
        ];
    }
}
