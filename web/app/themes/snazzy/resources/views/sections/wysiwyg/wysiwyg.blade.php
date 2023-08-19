@php
  $classes = [
    'wysiwyg',
    'container',
  ];

  if(@$section['container']) $classes[] = 'container-' . $section['container'];
@endphp

<div class="{!! implode(' ', $classes) !!}">
  {!! @$section['content'] !!}
</div>
