<?php

namespace App\View\Composers;
use Roots\Acorn\View\Composer;
use snazzycp\utilities;

class PageBuilder extends Composer
{
    protected static $views = [
        'template-pagebuilder',
        'page-student-resources',
        'front-page',
        'archive',
        'archive-*',
    ];

    public function with()
    {
        if(is_archive()):
            $post = utilities\archiveObject(get_post_type());
            setup_postdata($post);
        else:
            $post = get_post();
        endif;

        $id = @$post->ID;

        $sections = get_field('snazzy_pagebuilder', $id);

        if(is_archive()):
            wp_reset_postdata();
        endif;

        return [
            'sections' => $sections,
            'x' => 1,
        ];
    }
}
