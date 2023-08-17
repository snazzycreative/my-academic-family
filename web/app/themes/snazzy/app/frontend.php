<?php

namespace App\frontend;

function hero_srcset($args = [])
{
    global $_wp_additional_image_sizes;


    $default_args = [
        'name' => 'hero',
        'post' => get_post(),
        'lazy' => true,
    ];

    $args = wp_parse_args($args, $default_args);
    $name = $args['name'];
    $post = $args['post'];

    $image = get_post_thumbnail_id($post);

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

    if($image) {

      $full = wp_get_attachment_image_src($image, $name . '-xl');
      $lazy = wp_get_attachment_image_src($image, 'lazy');
      $alt = get_post_meta( $image, '_wp_attachment_image_alt', true );

      $srcsets = [];
      foreach($sizes as $size => $multiplier) {
        $srcsets[] = wp_get_attachment_image_src( $image, $name . '-' . $size )[0] . ' ' . wp_get_attachment_image_src( $image, $name . '-' . $size )[1] . 'w';
      }

      $atts = [
        'class' => 'hero-image hero-' . $name,
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

      <?php return ob_get_clean();

    } else {

      $path = 'images/defaults/';

      $multipliers = [ 1,  ];
      $lazy_height = 20 * 0.010416667;
      end($multipliers);

      $srcsets = [];
      foreach($sizes as $size => $multiplier) {
        $srcsets[] = App\asset_path($path.$name.'-default-'.$size.'.jpg') . ' ' . round($width * $multiplier) . 'w';
      }

      ob_start(); ?>

      <img
        class="default<?php if($args['lazy']) echo ' lazy'; ?>"
        src="<?= App\asset_path($path.$name.'-default-lazy.jpg') ?>"
        data-src="<?= App\asset_path($path.$name.'-default-xl.jpg') ?>"
        data-srcset="<?= implode(', ', $srcsets) ?>"
        width="<?= $width ?>"
        height="<?= $height ?>"
        alt="<?= $post->post_title; ?>"
        data-object-fit
      />

      <?php return ob_get_clean();

    }
}
