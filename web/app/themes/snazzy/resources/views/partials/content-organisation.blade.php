<article @php(post_class())>
  <div class="section {!! implode(' ', \App\section_container_classes($section)) !!}">
    @if($logo)
      <div class="organisation-image">
        @include('partials.image', [
          'id' => $logo,
          'class' => 'lazy',
        ])
      </div>
    @endif

    <div class="entry-summary organisation-details">
      <div class="wysiwyg">
        <h3 class="entry-title">{!! $title !!}</h3>
        @php(the_content())
      </div>

      <div class="organisation-footer">
        @if($link)
          <div class="organisation-link">
            {!! $link !!}
          </div>
        @endif

        {{ \snazzycp\frontend\post_social_channels() }}

      </div>
    </div>
  </div>
</article>
