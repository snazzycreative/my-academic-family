<article @php(post_class($card_classes))>
  <div class="grid-post-image">
    @include('partials.image', ['id' => $image, 'class' => 'lazy feat-image'])
    <div class="grid-post-image-border bg-quaternary"></div>
  </div>
  <div class="entry-summary grid-post-content inner">
    @include('partials.term-primary', $term)
    <div class="wysiwyg">
      <h3>{!! $title !!}</h3>
      @includeFirst(['partials.entry-meta-' . get_post_type(), 'partials.entry-meta'], [
        'schedule' => $schedule,
        'profile' => $profile,
      ])
      @php(the_excerpt())
      <a class="grid-post-link" href="{{ get_permalink() }}"><span class="visually-hidden">Read More</span></a>
    </div>
  </div>
  <div class="grid-post-button inner align-right">
    <p class="grid-post-link"><a href="{{ get_permalink() }}"><span>View {!! $singular !!}</span> <i class="fas fa-circle-right"></i></a></p>
  </div>
  <a class="grid-post-link-overlay" href="{{ get_permalink() }}"></a>
</article>
