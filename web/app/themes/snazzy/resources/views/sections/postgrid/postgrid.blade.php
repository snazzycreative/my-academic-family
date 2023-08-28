@php
  $args = \App\postgrid_args($section);
  $postgrid = new WP_Query($args);
@endphp

<div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
  @if(in_array(@$section['intro_location'], ['left', 'right']))
    <div class="section section-intro postgrid-intro postgrid-{!! $section['intro_location'] !!}">
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
  @endif
  @if($postgrid->have_posts())
    <div class="postgrid nolist grid grid-{!! $section['grid'] ?: 4 !!} grid-align-{!! @$section['alignment'] ?: 'centre' !!}">
      @while($postgrid->have_posts()) @php $postgrid->the_post() @endphp
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'], $section)
      @endwhile
      @php(wp_reset_query())
    </div>
  @endif
</div>
