@php
  $args = \App\postgrid_args($section);
  $postgrid = new WP_Query($args);
  $count = (@$section['count'] < 4) ? $section['count'] : 4;
  $gridAlign = (in_array(@$section['intro_location'], ['left', 'right'])) ? 'left' : 'centre';
@endphp

<div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
  @if($postgrid->have_posts())
    <div class="postgrid nolist grid grid-{!! $count !!} grid-align-{!! $gridAlign !!} postgrid-intro-{!! $section['intro_location'] !!}">

      @if(in_array(@$section['intro_location'], ['left', 'right']))
        <div class="grid-post postgrid-intro">
          <div class="section section-intro">
            <div class="wysiwyg">
              <h2>{!! @$section['intro']['heading'] !!}</h2>
              {!! apply_filters('the_content', @$section['intro']['blurb']) !!}
            </div>

            @include('partials.buttons', [
              'links' => [
                @$section['intro_link'],
              ],
            ])
          </div>
        </div>
      @endif

      @while($postgrid->have_posts()) @php $postgrid->the_post() @endphp
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'], $section)
      @endwhile
      @php(wp_reset_query())
    </div>
  @endif
</div>
