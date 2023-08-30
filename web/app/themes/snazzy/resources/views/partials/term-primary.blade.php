@if($id)
  <div class="grid-post-term grid-post-term-{!! $taxonomy !!} bg-black knockout">
    <a href="{!! $url !!}">
      <p><i class="fa-solid fa-{!! $icon !!}"></i> <span>{!! $name !!}</span></p>
    </a>
  </div>
@endif
