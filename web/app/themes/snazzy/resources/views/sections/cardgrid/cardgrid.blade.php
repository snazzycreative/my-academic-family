@php
  $cardClasses = \App\bgClasses([
    'colour'   => $section['card_colour'],
    'tint' => @$section['card_tint'],
    'contrast' => @$section['card_contrast'],
  ], true);

  $knockoutNumber = \snazzycp\utilities\is_knockout(\snazzycp\utilities\colour_name_to_hex(@$section['colour']));
@endphp

@if(@$section['cards'])
  @extends('sections.section.section', $section)

  @section('pagebuilder-block-content')
    <div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
      <div class="cardgrid nolist grid grid-{!! $section['grid'] ?: 4 !!} grid-align-{!! $section['alignment'] ?: 'centre' !!}">
        @php($x = 1)
        @foreach($section['cards'] as $card)
          <div class="cardgrid-item grid-item {!! implode(' ', $cardClasses) !!} @if(@$section['numbered']) cardgrid-numbered @endif">
            <div class="cardgrid-image" style="opacity: {!! @$section['image_opacity'] * 0.01 ?: 0.3 !!}">
              @if(@$card['image']['ID'])
                {!! \App\frontend\img_srcset([
                  'name' => 'overview',
                  'image' => $card['image']['ID'],
                  'sizes' => 3,
                ]) !!}
              @endif
            </div>
            <div class="cardgrid-content-wrap">
              <div class="inner inner-large">
                <div class="cardgrid-content">
                  @if(@$section['numbered'])
                    <div class="cardgrid-number bg-{!! @$section['colour'] ?: 'default' !!} @if($knockoutNumber) knockout @endif"><p>{!! $x !!}</p></div>
                  @endif
                  <div class="wysiwyg">
                    @if(@$card['content']['heading'])
                      <h3>{!! $card['content']['heading'] !!}</h3>
                    @endif

                    {!! apply_filters('the_content', @$card['content']['text']) !!}
                  </div>
                </div>
              </div>
            </div>
            <div class="cardgrid-buttons inner inner-large">
              @include('partials.buttons', ['links' => @$card['content']['links']])
            </div>
          </div>
          @php($x++)
        @endforeach
      </div>
    </div>
  @overwrite
@endif
