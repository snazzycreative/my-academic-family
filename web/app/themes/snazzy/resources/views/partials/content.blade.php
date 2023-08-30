<article @php(post_class($card_classes))>
  <div class="grid-post-image">
    @include('partials.image', ['id' => $image, 'class' => 'lazy'])
    <div class="grid-post-image-border bg-{!! $accent !!}"></div>
  </div>
  <div class="entry-summary grid-post-content inner">
    @include('partials.term-primary', $term)
    <div class="wysiwyg">
      <h3 class="entry-title">{!! $title !!}</h3>
      @includeFirst(['partials.entry-meta-' . get_post_type(), 'partials.entry-meta'], $schedule)
      @php(the_excerpt())
      <a class="grid-post-link" href="{{ get_permalink() }}"><span class="visually-hidden">Read More</span></a>
    </div>
  </div>
  <div class="grid-post-button inner align-right">
    <button class="block"><span>View {!! $singular !!}</span> <i class="fas fa-circle-right"></i></button>
  </div>
</article>
