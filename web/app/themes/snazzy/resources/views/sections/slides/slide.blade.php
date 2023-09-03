@php
  if($glidejs) $slide_classes[] = 'glide__slide';
@endphp

<article id="hero-slide-{!! $x !!}" @php(post_class($slide_classes))>
  @if($video)
    @php($video['autoplay'] = ($x > 0) ? false : true)
    <div class="banner-video" style="opacity: {!! $opacity !!}">
      @include('partials.background-video', $video)
    </div>
  @elseif($image)
    <div class="banner-image" style="opacity: {!! $opacity !!}">
      {!! \App\frontend\img_srcset([
        'image' => $image,
        'name' => 'hero',
        'lazy' => false
      ]) !!}
    </div>
  @endif

  <div class="overlay">
    <div class="section">
      <div class="container container-small align-centre">
        <div class="titlebar" style="font-size: {!! $heading_scale !!}em;">
          {{ the_title('<h1>','</h1>') }}
        </div>
        <div class="wysiwyg">
          @php(the_excerpt())
        </div>
        @include('partials.buttons', ['links' => $buttons])
      </div>
    </div>
  </div>

</article>
