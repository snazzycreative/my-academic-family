<?php

namespace App\frontend;

function img_srcset($args = [])
{
    global $_wp_additional_image_sizes;


    $default_args = [
        'name' => 'hero',
        'image' => null,
        'lazy' => true,
        'sizes' => 5,
    ];

    $args = wp_parse_args($args, $default_args);
    $name = $args['name'];

    $image = ($args['image']) ? $args['image'] : get_post_thumbnail_id();
    $properties = @$_wp_additional_image_sizes[$name . '-xl'];

    $width = @$properties['width'];
    $height = @$properties['height'];

    $sizes = [
      'xl' => 1,
      'lg' => 0.75,
      'md' => 0.52083333,
      'sm' => 0.33333333,
      'xs' => 0.20833333,
    ];

    if($args['sizes'] < 5) $sizes = array_slice($sizes, 0, $args['sizes']);

    if($image) {

      $full = wp_get_attachment_image_src($image, $name . '-xl');
      $lazy = wp_get_attachment_image_src($image, 'lazy');
      $alt = get_post_meta( $image, '_wp_attachment_image_alt', true );

      $srcsets = [];
      foreach($sizes as $size => $multiplier) {
        $srcsets[] = wp_get_attachment_image_src( $image, $name . '-' . $size )[0] . ' ' . wp_get_attachment_image_src( $image, $name . '-' . $size )[1] . 'w';
      }

      $atts = [
        'class' => $name . '-image',
        'src' => $full[0],
        'srcset' => implode(', ', $srcsets),
        'width' => $width,
        'height' => $height,
        'alt' => $alt,
      ];

      if($args['lazy']):
        $atts['class'] .= ' lazy';
        $atts['src'] = $lazy[0];
        $atts['srcset'] = null;
        $atts['data-src'] = $full[0];
        $atts['data-srcset'] = implode(', ', $srcsets);
      endif;

      ob_start(); ?>

      <img
        <?php foreach($atts as $att => $value):
            if($value) echo $att . '="' . $value . '" ';
        endforeach; ?>
      />

      <?php $html = ob_get_clean();
    }

    return $html;
}
