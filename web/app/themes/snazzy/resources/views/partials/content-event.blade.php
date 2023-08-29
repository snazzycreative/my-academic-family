<article @php(post_class($card_classes))>
  <div class="entry-summary">
    <div class="inner">
      <div class="wysiwyg">
        <h2 class="entry-title">
          <a href="{{ get_permalink() }}">
            {!! $title !!}
          </a>
        </h2>
        @include('partials.entry-meta')

        start {!! get_post_meta(get_the_ID(), 'snazzy_timestamp_start', true) !!}</br>
        end {!! get_post_meta(get_the_ID(), 'snazzy_timestamp_end', true) !!}</br>

        @php(the_excerpt())
      </div>
    </div>
  </div>
</article>
