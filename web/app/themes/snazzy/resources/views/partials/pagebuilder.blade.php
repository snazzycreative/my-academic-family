@if($sections)
  <div class="pagebuilder-wrap">
    @foreach($sections as $section)
      @php
        $layout = @$section['acf_fc_layout'];
        $section['row_number'] = $x;
        $section['knockout_content'] = \App\knockout_content($section['acf_fc_layout']);
      @endphp

      @includeFirst(["sections.$layout.$layout", "sections.section.section-default"], $section)

      @php($x++)

    @endforeach
  </div>
@endif
