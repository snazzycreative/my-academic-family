@if($sections)
  <div class="pagebuilder-wrap">
    @foreach($sections as $section)
      @php
        $section['row_number'] = $x;
        $section['knockout_content'] = \App\knockout_content($section['acf_fc_layout']);
      @endphp

      @include('sections.section.section', $section)
      @php($x++)
    @endforeach
  </div>
@endif
