@if($id)
  @php
    $image = wp_get_attachment_image_src($id, 'medium');
    $lazy = wp_get_attachment_image_src($id, 'lazy');
  @endphp
  <img
    class="{!! $class !!}"
    @if(str_contains($class, 'lazy'))
      src="{!! @$lazy[0] !!}"
      data-src="{!! @$image[0] !!}"
    @else
      src="{!! @$image[0] !!}"
    @endif
    width="{!! @$image[1] !!}"
    height="{!! @$image[2] !!}"
    alt="{!! get_post_meta($id, '_wp_attachment_image_alt', true) !!}"
  />
@endif
