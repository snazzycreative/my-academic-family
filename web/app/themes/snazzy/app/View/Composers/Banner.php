<?php
namespace App\View\Composers;
use App;
use Roots\Acorn\View\Composer;
use snazzycp\frontend;
use snazzycp\utilities;
use snazzycp\data;

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
        $colour = @$props['colour'];
        $tint = @$props['tint'];
        $pattern = @$props['pattern'];
        $contrast = @$props['contrast'];

        $image = get_post_thumbnail_id();
        $style = get_field($prefix . '_style');
        $excerpt = apply_filters('the_content', $post->post_excerpt);

        if($image && $style) $classes[] = 'has-image';
        if(!$excerpt) $classes[] = 'no-excerpt';

        if($colour):
            $hex = frontend\snazzycp_info('color_' . $colour);

            if($tint):
                $tints = data\colour_tints();
                $hex = utilities\adjustBrightness($hex, $tints[$tint]);
            endif;

            $knockout = utilities\high_contrast($hex);

            if($colour && $tint && !in_array($colour, ['white', 'black'])):
                $classes[] = 'bg-' . $colour . '-' . $tint;
            elseif($colour):
                $classes[] = 'bg-' . $colour;
            endif;

            if($contrast == 'light'):
                $classes[] = 'knockout';
            elseif(!$contrast && $knockout):
                $classes[] = 'knockout';
            endif;
        else:
            $classes[] = 'bg-default';
        endif;

        if($pattern) $classes[] = 'bg-pattern';

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
