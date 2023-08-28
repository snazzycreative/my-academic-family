<article @php(post_class($card_classes))>
  <header>


    @include('partials.entry-meta')
  </header>

  <div class="entry-summary">
    <div class="inner">
      <div class="wysiwyg">
        <h2 class="entry-title">
          <a href="{{ get_permalink() }}">
            {!! $title !!}
          </a>
        </h2>
        @php(the_excerpt())
      </div>
    </div>
  </div>
</article>
