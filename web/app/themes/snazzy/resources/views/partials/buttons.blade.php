@if($links)
  <div class="section-buttons">
    @foreach($links as $link)
      @if($link['link'])
        <a class="{!! implode(' ', \App\buttonClasses($link)) !!}" href="{!! $link['link']['url'] !!}" target="{!! $link['link']['target'] !!}">
          {!! $link['link']['title'] !!}
        </a>
      @endif
    @endforeach
  </div>
@endif
