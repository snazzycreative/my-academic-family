<section class="banner bg-white">
  <div class="grid-post-image">

    @if($cover)
      {!! \App\frontend\img_srcset([
        'image' => $cover,
        'name' => 'banner',
        'lazy' => false,
        'class' => 'feat-image',
      ]) !!}
    @else
      <div class="feat-placeholder bg-primary bg-pattern bg-pattern-white"></div>
    @endif

    @if($image)
      {!! \App\frontend\img_srcset([
        'image' => $image,
        'name' => 'overview',
        'lazy' => false,
        'sizes' => 3,
        'class' => 'portrait-image',
      ]) !!}
    @endif
    <div class="grid-post-image-border bg-quaternary"></div>
  </div>
</section>
