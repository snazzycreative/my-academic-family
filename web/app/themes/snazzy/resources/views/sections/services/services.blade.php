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
  <div class="service-wrap">
    @while($services->have_posts()) @php $services->the_post() @endphp
      @includeFirst(['partials.content-service', 'partials.content'], $section)
    @endwhile
    @php(wp_reset_query())
  </div>
@endif
