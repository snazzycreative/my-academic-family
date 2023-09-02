@if(@$section['content'])
  @extends('sections.section.section', $section)

  @section('pagebuilder-block-content')
    @php
      $classes = \App\section_container_classes($section);
      $classes[] = 'wysiwyg';
    @endphp

    <div class="{!! implode(' ', $classes) !!}">
      {!! $section['content'] !!}
    </div>
  @overwrite
@endif
