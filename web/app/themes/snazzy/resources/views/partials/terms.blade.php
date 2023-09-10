@if($terms)
  <ul class="post-terms nolist">
    @foreach($terms as $term)
      <li><a href="{!! get_term_link($term->term_id) !!}"><span>{!! $term->name !!}</span></a></li>
    @endforeach
  </ul>
@endif
