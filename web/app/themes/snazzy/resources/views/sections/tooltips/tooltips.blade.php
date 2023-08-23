<div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
  @if($section['tiles'])
    <ul class="tooltip-tiles nolist grid-{!! $section['grid'] ?: 4 !!} grid-align-{!! $section['alignment'] ?: 'centre' !!}">
      @foreach($section['tiles'] as $tile)
        <li class="tooltip-tile bg-{!! $tile['icon']['colour'] ?: 'default' !!} knockout">
          <div class="inner">
            <h3 class="section-title">{!! $tile['text']['heading'] !!}</h3>
            <div class="tooltip wysiwyg">
              @if(@$tile['text']['tooltip'])
                <i class="white fas fa-info-circle"></i>
                <p>{!! $tile['text']['tooltip'] !!}</p>
              @endif
            </div>
          </div>
        </li>
      @endforeach
    </ul>
  @endif
</div>
