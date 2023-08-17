<section class="{!! $classes !!}">
  @if($image)
    <div class="banner-image" style="opacity: {!! $opacity !!}">
      {!! \App\frontend\hero_srcset(['name' => 'banner', 'lazy' => false]) !!}
    </div>
  @endif

  <div class="overlay">
    <div class="section container align-centre">
      <div class="titlebar" style="font-size: {!! $heading_scale !!}em;">
        <h1>{!! $title !!}</h1>
        {!! $excerpt !!}
      </div>
    </div>
  </div>
</section>
