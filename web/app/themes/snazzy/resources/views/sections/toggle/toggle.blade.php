@extends('sections.section.section', $section)

@section('pagebuilder-block-content')
  <div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
    <ul class="nolist">
      @foreach([$section['left'], $section['right']] as $toggle)
        <li @if(get_the_ID() == $toggle['link']) class="active" @endif >
          <a href="{!! get_the_permalink($toggle['link']) !!}">
            <span>{!! $toggle['sublabel'] !!}</span>
            <strong>{!! $toggle['label'] !!}</strong>
          </a>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
