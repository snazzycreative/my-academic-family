<div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
  @if($section['icons'])
    <ul class="grid-icons nolist grid-{!! $section['grid'] ?: 4 !!} grid-align-{!! $section['alignment'] ?: 'centre' !!}">
      @foreach($section['icons'] as $icon)
        <li class="grid-icon">
          <div class="grid-icon-icon">
            <i class="fas fa-{!! @$icon['icon']['fontawesome_solid'] ?: 'question-circle' !!} {!! @$icon['icon']['colour'] ?: 'black' !!}"></i>
          </div>
          <div class="grid-icon-content wysiwyg">
            @if(@$icon['text']['heading'])
              <h3>{!! $icon['text']['heading'] !!}</h3>
            @endif

            {!! apply_filters('the_content', @$icon['text']['text']) !!}

          </div>
        </li>
      @endforeach
    </ul>
  @endif
</div>
