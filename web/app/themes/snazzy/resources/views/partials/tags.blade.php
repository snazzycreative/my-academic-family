@if($tags)
  <ul class="post-tags nolist">
    @foreach($tags as $tag)
      <li><a href="{!! get_term_link($tag->term_id) !!}"><span>{!! $tag->name !!}</span></a></li>
    @endforeach
  </ul>
@endif
