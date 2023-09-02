@php
  $args = \App\postgrid_args($section);
  $postgrid = new WP_Query($args);
  $count = (@$section['count'] < 4) ? $section['count'] : 4;
  $gridAlign = (in_array(@$section['intro_location'], ['left', 'right'])) ? 'left' : 'centre';
  $knockout = \snazzycp\utilities\is_knockout(\snazzycp\utilities\colour_name_to_hex(@$section['background']['colour'], @$section['background']['tint']), @$section['background']['contrast']);
@endphp

@extends('sections.section.section', $section)

@section('pagebuilder-block-content')
  <div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
    <div class="postgrid nolist grid grid-{!! $count !!} grid-align-{!! $gridAlign !!} postgrid-intro-{!! $section['intro_location'] !!}">

        @if(in_array(@$section['intro_location'], ['left', 'right']))
          <div class="grid-post postgrid-intro @if($knockout) knockout @endif">
            <div class="section section-intro">
              <div class="wysiwyg">
                <h2>{!! @$section['intro']['heading'] !!}</h2>
                {!! apply_filters('the_content', @$section['intro']['blurb']) !!}
              </div>

              @include('partials.buttons', [
                'links' => [
                  @$section['intro_link'],
                ],
              ])
            </div>
          </div>
        @endif

      @if($postgrid->have_posts())
        @while($postgrid->have_posts()) @php $postgrid->the_post() @endphp
          @includeFirst(['partials.content-' . get_post_type(), 'partials.content'], $section)
        @endwhile
      @else
        <article class="bg-white grid-post placeholder">
          <div class="inner">
            <h3>{!! @$section['fallback'] ?: 'There are no posts for this section. Please check back later.' !!}</h3>
          </div>
        </article>
      @endif
      </div>
  </div>
@overwrite

@php(wp_reset_query())
