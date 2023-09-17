<article @php(post_class($card_classes))>
  <div class="grid-post-image">
    @include('partials.image', [
      'id' => $image,
      'class' => 'lazy portrait-image',
      'size' => 'thumbnail'
    ])
    @include('partials.image', ['id' => $cover, 'class' => 'lazy feat-image'])
    <div class="grid-post-image-border bg-{{ $accent['colour'] }}"></div>
  </div>
  <div class="entry-summary grid-post-content inner">
    @include('partials.term-primary', $term)
    <div class="wysiwyg align-centre">
      @include('partials.entry-meta-team')
      <hr/>
      @php(the_excerpt())
    </div>
  </div>
  <div class="grid-post-button inner">
    {{ \snazzycp\frontend\post_social_channels() }}
    <div class="section-buttons align-right">
      <p class="grid-post-link"><a href="{{ get_permalink() }}"><span>View Bio</span> <i class="fas fa-circle-right"></i></a></p>
    </div>
  </div>
  <a class="grid-post-link-overlay" href="{{ get_permalink() }}"></a>
</article>
