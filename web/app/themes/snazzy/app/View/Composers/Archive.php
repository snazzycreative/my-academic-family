<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
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

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        $postType = get_post_type();
        $page_for_archive = get_option('page_for_' . $postType);
        $post = get_post($page_for_archive);

        return [
            'post' => $post,
        ];
    }
}
