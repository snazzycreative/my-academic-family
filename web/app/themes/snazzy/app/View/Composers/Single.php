<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use App;

class Single extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'layouts.single',
        'single',
        'single-*',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        $post = get_post();

        $cardClasses = App\bgClasses(['colour'   =>'white']);
        $cardClasses[] = 'grid-post';

        $postType = get_post_type();
        $postTypeObj = get_post_type_object($postType);

        $id = get_the_ID();

        $related = null;

        $tax = App\post_taxonomy($postType);
        $primaryTermID = get_post_meta($id, '_primary_term_' . $tax, true);
        $postTerms = wp_get_post_terms($id, $tax, ['exclude' => $primaryTermID]);

        $tags = wp_get_post_terms($id, 'post_tag');



        return [
            'related' => $related,
            'related_heading' => __('Related ' . $postTypeObj->labels->name, 'sage'),
            'tags' => $tags,
            'terms' => $postTerms,
            'banner' => $this->banner($postType),
        ];
    }

    public function banner($postType = null)
    {
        if(is_null($postType)) return false;

        switch($postType):
            case 'service':
                return 'service';
                break;
            default:
                return 'none';
                break;
        endswitch;
    }
}
