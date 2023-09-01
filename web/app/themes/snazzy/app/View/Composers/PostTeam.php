<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App;

class PostTeam extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-team',
        'partials.content-mentor',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function with()
    {
        $ID = get_the_ID();
        $post = get_post();
        $postType = get_post_type();
        $prefix = 'snazzy_personal_';

        $fields = [
            'title',
            'education',
            'credentials',
            'pronouns',
        ];

        $acf = [];

        foreach($fields as $field):
            $acf['personal_' . $field] = get_field($prefix . $field);
        endforeach;

        $individual = [
            'cover' => get_post_meta($ID, $postType . '_cover_photo_thumbnail_id', true),
        ];

        $return = array_merge($acf, $individual);

        return $return;
    }
}
