<article @php(post_class())>
  <div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
    <div class="service-image">
      {!! \App\frontend\img_srcset(['name' => 'overview', 'sizes' => 3]) !!}
    </div>

    <div class="entry-summary service-details {!! implode(' ', $bgClasses) !!}">
      <div class="inner">
        <div class="wysiwyg">
          <h2 class="entry-title">{!! $title !!}</h2>
          <hr/>
          @php(the_excerpt())
        </div>

        <div class="service-footer">
          @include('partials.buttons', ['links' => @$links])
        </div>
      </div>
    </div>
  </div>
</article>
