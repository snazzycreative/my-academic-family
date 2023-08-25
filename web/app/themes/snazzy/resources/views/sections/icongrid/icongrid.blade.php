<div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
  @if(@$section['icons'])
    <div class="icongrid grid grid-{!! $section['grid'] ?: 4 !!} grid-align-{!! $section['alignment'] ?: 'centre' !!}">
      @foreach($section['icons'] as $icon)
        <div class="icongrid-item grid-item">
          <div class="icongrid-icon">
            <i class="fas fa-{!! @$icon['icon']['fontawesome_solid'] ?: 'question-circle' !!} {!! @$icon['icon']['colour'] ?: 'black' !!}"></i>
          </div>
          <div class="icongrid-content wysiwyg">
            @if(@$icon['text']['heading'])
              <h3>{!! $icon['text']['heading'] !!}</h3>
            @endif

            {!! apply_filters('the_content', @$icon['text']['text']) !!}

          </div>
        </div>
      @endforeach
    </div>
  @endif
</div>
