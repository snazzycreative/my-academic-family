<div class="single-intro">
  <h1>{!! $title !!}</h1>
  @include('partials.entry-meta')
  @include('partials.image', ['id' => $image])
</div>

<div class="wysiwyg">
  @php(the_content())
</div>

{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
