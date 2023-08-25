<div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
  @if(@$section['cards'])
    <div class="cardgrid nolist grid grid-{!! $section['grid'] ?: 4 !!} grid-align-{!! $section['alignment'] ?: 'centre' !!}">
      @foreach($section['cards'] as $card)
        <div class="cardgrid-item grid-item">
          <div class="inner">

          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
<pre>{!! print_r($section) !!}</pre>
