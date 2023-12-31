<div class="single-intro">
  <h1>{!! $title !!}</h1>
  @include('partials.entry-meta')

  @if($image)
    {!! \App\frontend\img_srcset([
      'image' => $image,
      'name' => 'overview',
      'lazy' => false,
      'sizes' => 3,
    ]) !!}
  @endif
</div>

<div class="wysiwyg">
  @php(the_content())
</div>

{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
