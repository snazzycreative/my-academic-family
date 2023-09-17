<section class="{!! $classes !!}">
  @if($image && $style == 'image')
    <div class="banner-image" style="opacity: {!! $opacity !!}">
      {!! \App\frontend\img_srcset([
        'image' => $image,
        'name' => 'banner',
        'lazy' => false
      ]) !!}
    </div>
  @endif

  <div class="overlay">
    <div class="section">
      <div class="container container-small align-centre">
        <div class="titlebar" style="font-size: {!! $heading_scale !!}em;">
          <h1>{!! $title !!}</h1>
        </div>
        <div class="wysiwyg">
          {!! $excerpt !!}
        </div>
      </div>
    </div>
  </div>
</section>
