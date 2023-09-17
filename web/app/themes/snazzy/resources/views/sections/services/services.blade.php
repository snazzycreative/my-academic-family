@php
  $source = @$section['source'];
  $relationship = @$section['relationship'];
  $select = @$section['select'];

  if($source == 'specific' && $select):
    $args['post__in'] = $select;
  endif;

  $services = new WP_Query($args);
@endphp

@if($services->have_posts())
  @extends('sections.section.section', $section)

  @section('pagebuilder-block-content')
    <div class="service-wrap">
      @while($services->have_posts()) @php $services->the_post() @endphp
        @includeFirst(['partials.content-service', 'partials.content'], $section)
      @endwhile
    </div>
  @overwrite
@endif

@php(wp_reset_query())
