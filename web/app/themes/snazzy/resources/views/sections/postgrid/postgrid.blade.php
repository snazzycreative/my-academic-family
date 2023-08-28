@php
  $args = \App\postgrid_args($section);
  $posts = new WP_Query($args);

  $section['card_classes'] = \App\bgClasses([
    'colour'   => $section['card_colour'],
    'tint' => @$section['card_tint'],
    'contrast' => @$section['card_contrast'],
  ], true);
@endphp

<div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
  @if($posts->have_posts())
    <div class="postgrid nolist grid grid-{!! $section['grid'] ?: 4 !!} grid-align-{!! @$section['alignment'] ?: 'centre' !!}">
      @while($posts->have_posts()) @php $posts->the_post() @endphp
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'], $section)
      @endwhile
      @php(wp_reset_query())
    </div>
  @endif
</div>

<pre>{!! print_r($args) !!}</pre>
<pre>{!! print_r($section) !!}</pre>
