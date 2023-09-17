@php
  $heading = @$section['intro']['heading'];
  $classes = array_merge(\App\section_classes($section), \App\bgClasses(@$section['background'], @$section['knockout_content']));
  $knockout = \snazzycp\utilities\is_knockout(\snazzycp\utilities\colour_name_to_hex(@$section['background']['colour'], @$section['background']['tint']), @$section['background']['contrast']);
@endphp

<section id="pagebuilder-{!! $section['acf_fc_layout'] !!}-{!! $section['row_number'] !!}" class="{!! implode(' ', $classes) !!}">
  @if(($heading || @$section['intro']['blurb']) && !in_array(@$section['intro_location'], ['left', 'right']))
    @php
      $h = @$section['intro_settings']['heading_size'] ?: 2;
      $introClasses = \App\section_intro_footer_classes(@$section['intro_settings'], 'intro');
      if($knockout) $introClasses[] = 'knockout';
    @endphp

    <div class="{!! implode(' ', $introClasses) !!}">
      <div class="wysiwyg">
        <h{!! $h !!}>{!! $heading !!}</h{!! $h !!}>

        @if(@$section['intro']['blurb'])
          {!! apply_filters('the_content', @$section['intro']['blurb']) !!}
        @endif
        </div>
    </div>
  @endif

  @yield('pagebuilder-block-content')

  @if(@$section['footer']['blurb'] || @$section['footer']['links'])
    @php
      $footerClasses = \App\section_intro_footer_classes(@$section['footer_settings'], 'footer');
      if($knockout) $footerClasses[] = 'knockout';
    @endphp

    <div class="{!! implode(' ', $footerClasses) !!}">
      <div class="wysiwyg">
        @if(@$section['footer']['blurb'])
          {!! apply_filters('the_content', @$section['footer']['blurb']) !!}
        @endif
      </div>

      @include('partials.buttons', ['links' => @$section['footer']['links']])

    </div>

  @endif

</section>
