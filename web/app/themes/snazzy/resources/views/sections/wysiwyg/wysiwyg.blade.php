@php
  $classes = \App\section_container_classes($section);
  $classes[] = 'wysiwyg';
@endphp

<div class="{!! implode(' ', $classes) !!}">
  {!! @$section['content'] !!}
</div>
