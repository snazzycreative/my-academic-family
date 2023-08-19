<?php
namespace App\View\Composers;
use App;
use Roots\Acorn\View\Composer;

class Banner extends Composer
{
    protected static $views = [
        'sections.banner.banner',
    ];

    public function with()
    {
        $post = get_post();
        $prefix = 'snazzy_banner';

        $classes = [
            'banner',
        ];

        $props = App\background_settings($prefix);
        $bgClasses = App\bgClasses($props, true);
        $classes = array_merge($classes, $bgClasses);

        $image = get_post_thumbnail_id();
        $style = get_field($prefix . '_style');
        $excerpt = apply_filters('the_content', $post->post_excerpt);

        if($image && $style) $classes[] = 'has-image';
        if(!$excerpt) $classes[] = 'no-excerpt';

        return [
            'classes' => implode(' ', $classes),
            'heading_scale' => get_field($prefix . '_heading'),
            'style' => $style,
            'opacity' => (int)get_field($prefix . '_opacity') * 0.01 ?: 0.7,
            'image' => $image,
            'title' => get_the_title(),
            'excerpt' => $excerpt,
        ];
    }
}
