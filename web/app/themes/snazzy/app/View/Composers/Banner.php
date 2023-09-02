<?php

namespace App\View\Composers;
use Roots\Acorn\View\Composer;
use snazzycp\utilities;
use App;

class Banner extends Composer
{
    protected static $views = [
        'sections.banner.banner',
        'sections.banner.banner-*',
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
        $prefix = 'snazzy_banner';

        $classes = [
            'banner',
        ];

        $props = App\background_settings($prefix, $id);
        $bgClasses = App\bgClasses($props);
        $classes = array_merge($classes, $bgClasses);

        $knockout = utilities\is_knockout(utilities\colour_name_to_hex(@$props['colour'], @$props['tint']), @$props['contrast']);

        $image = get_post_meta($id, '_thumbnail_id', true);
        $style = get_field($prefix . '_style', $id);
        $title = @$post->post_title;
        $excerpt = apply_filters('the_content', @$post->post_excerpt);

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
            'knockout' => $knockout,
        ];
    }
}
