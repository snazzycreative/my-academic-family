<?php

namespace App\View\Composers;
use Roots\Acorn\View\Composer;
use App;

class Banner extends Composer
{
    protected static $views = [
        'sections.banner.banner',
    ];

    public function with()
    {
        if(is_archive()):
            $post = $this->archiveObject(get_post_type());
            setup_postdata($post);
        else:
            $post = get_post();
        endif;

        $id = @$post->ID;
        $prefix = 'snazzy_banner';

        $classes = [
            'banner',
        ];

        $props = App\background_settings($prefix, $id);
        $bgClasses = App\bgClasses($props, true);
        $classes = array_merge($classes, $bgClasses);

        $image = get_post_thumbnail_id();
        $style = get_field($prefix . '_style', $id);
        $title = $post->post_title;
        $excerpt = apply_filters('the_content', $post->post_excerpt);

        if($image && $style) $classes[] = 'has-image';
        if(!$excerpt) $classes[] = 'no-excerpt';

        $headingScale = get_field($prefix . '_heading', $id);
        $opacity = (int)get_field($prefix . '_opacity', $id) * 0.01 ?: 0.7;

        if(is_archive()):
            wp_reset_postdata();
        endif;

        return [
            'classes' => implode(' ', $classes),
            'heading_scale' => $headingScale,
            'style' => $style,
            'opacity' => $opacity,
            'image' => $image,
            'title' => $title,
            'excerpt' => $excerpt,
            'postobject' => $post,
        ];
    }

    public function archiveObject($postType = null)
    {
        if(is_null($postType)) return;
        $page_for_archive = get_option('page_for_' . $postType);
        return ($page_for_archive) ? get_post($page_for_archive) : null;
    }
}
