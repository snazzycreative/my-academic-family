@php
  $source = @$section['source'];
  $relationship = @$section['relationship'];
  $select = @$section['select'];

  if($source == 'term' && $relationship):
    $tax_query['terms'] = $relationship;

    $args['tax_query'] = [
      $tax_query,
    ];
  endif;

  if($source == 'specific' && $select):
    $args['post__in'] = $select;
  endif;

  $organisations = new WP_Query($args);

@endphp

@if($organisations->have_posts())
  <div class="organisation-wrap">
    @while($organisations->have_posts()) @php $organisations->the_post() @endphp
      @includeFirst(['partials.content-organisation', 'partials.content'], $section)
    @endwhile
    @php(wp_reset_query())
  </div>
@endif
