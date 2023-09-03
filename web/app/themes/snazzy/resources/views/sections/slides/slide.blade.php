<article @php(post_class($slide_classes))>
  @if($video)
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
          @php(the_excerpt())
          @include('partials.buttons', ['links' => $buttons])
        </div>
      </div>
    </div>
  </div>

</article>
