@php
  $cardClasses = \App\bgClasses([
    'colour'   => $section['card_colour'],
    'tint' => @$section['card_tint'],
    'contrast' => @$section['card_contrast'],
  ], true);

  $knockoutNumber = \App\is_knockout(\snazzycp\utilities\colour_name_to_hex(@$section['colour']));
@endphp

<div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
  @if(@$section['cards'])
    <div class="cardgrid nolist grid grid-{!! $section['grid'] ?: 4 !!} grid-align-{!! $section['alignment'] ?: 'centre' !!}">
      @php($x = 1)
      @foreach($section['cards'] as $card)
        <div class="cardgrid-item grid-item {!! implode(' ', $cardClasses) !!} @if(@$section['numbered']) cardgrid-numbered @endif">
          @if(@$card['image']['ID'])
            <div class="cardgrid-image" style="opacity: {!! @$section['image_opacity'] * 0.01 ?: 0.3 !!}">
              {!! \App\frontend\img_srcset([
                'name' => 'overview',
                'image' => $card['image']['ID'],
                'sizes' => 3,
              ]) !!}
            </div>
          @endif
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

                @include('partials.buttons', ['links' => @$card['content']['links']])

              </div>
            </div>
          </div>
        </div>
        @php($x++)
      @endforeach
    </div>
  @endif
</div>
