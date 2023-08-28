@php
  $postType = @$section['post_type'];
  $IDs = @$section['select_' . $postType];
  $source = @$section['source'];
  $status = @$section['status'];
  $type = @$section['type'];

  $cardClasses = \App\bgClasses([
    'colour'   => $section['card_colour'],
    'tint' => @$section['card_tint'],
    'contrast' => @$section['card_contrast'],
  ], true);

  $args = [
    'post_type' => $postType,
    'post_status' => 'publish',
    'numberposts' => 4,
  ];

  if(!$source && $type && @$taxonomy[$postType]):
    $args['tax_query'] = [
      [
        'taxonomy' => @$taxonomy[$postType],
        'terms' => $type,
        'field' => 'term_id',
        'operator' => 'IN',
      ],
    ];
  endif;

  if(!$source && $status == 'upcoming' && $postType == 'event'):
    $args['meta_query'] = [
      [
        'key' => null,
        'value' => null,
        'operator' => '',
      ],
    ];
  endif;

  if(!$source && $status == 'past' && $postType == 'event'):
    $args['meta_query'] = [
      [
        'key' => null,
        'value' => null,
        'operator' => '',
      ],
    ];
  endif;

  if($IDs && $source == 'specific') $args['posts__in'] = $IDs;

  $posts = new WP_Query($args);

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
