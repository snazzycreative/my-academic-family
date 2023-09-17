<video
  class="js-bgvid"
  src="{!! @$srcset[$smallest]['url'] !!}"
  @if($image) data-poster="{!! @wp_get_attachment_image_src($image, 'hero-' . $smallest)[0] !!}" @endif
  data-sizes='{!! $video_sizes !!}'
  autoplay
  loop
  muted
>
  @foreach($srcset as $size => $video)
    @if($video)
      <source
        class="bgvid-{!! $size !!}"
        src="{!! $video['url'] !!}"
        type="{!! $video['mime_type'] !!}"
        media="all and (max-width: {!! $video['width'] !!})"
        data-width="{!! $video['width'] !!}"
        @if($image) data-poster="{!! @wp_get_attachment_image_src($image, 'hero-' . $size)[0] !!}" @endif
      >
    @endif
  @endforeach

  @if($image)
    {!! \App\frontend\img_srcset([
      'image' => $image,
      'name' => 'hero',
      'lazy' => true
    ]) !!}
  @endif
</video>
