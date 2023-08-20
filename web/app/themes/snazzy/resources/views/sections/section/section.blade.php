@php
  $heading = @$section['intro']['heading'];
  $classes = array_merge(\App\section_classes($section), \App\bgClasses(@$section['background'], @$section['knockout_content']));
  $knockout = \App\is_knockout(\App\colour_name_to_hex(@$section['background']['colour'], @$section['background']['tint']), @$section['background']['contrast']);
@endphp

<section id="pagebuilder-{!! $section['acf_fc_layout'] !!}-{!! $section['row_number'] !!}" class="{!! implode(' ', $classes) !!}">
  @if($heading)
    @php
      $h = @$section['intro_settings']['heading_size'] ?: 2;
      $introClasses = \App\section_intro_footer_classes(@$section['intro_settings'], 'intro');
      if($knockout) $introClasses[] = 'knockout';
    @endphp

    <div class="{!! implode(' ', $introClasses) !!}">
      <h{!! $h !!} class="section-title">{!! $heading !!}</h{!! $h !!}>

      @if(@$section['intro']['blurb'])
        {!! apply_filters('the_content', @$section['intro']['blurb']) !!}
      @endif
    </div>
  @endif

  @includeFirst(['sections.' . $section['acf_fc_layout'] . '.' . $section['acf_fc_layout'], 'sections.section.section-default'])

  @if(@$section['footer']['blurb'] || @$sections['footer']['links'])
    @php
      $footerClasses = \App\section_intro_footer_classes(@$section['footer_settings'], 'footer');
      if($knockout) $footerClasses[] = 'knockout';
    @endphp

    <div class="{!! implode(' ', $footerClasses) !!}">
      @if(@$section['footer']['blurb'])
        {!! apply_filters('the_content', @$section['footer']['blurb']) !!}
      @endif

      @include('partials.buttons', ['links' => @$section['footer']['links']])

    </div>

  @endif

</section>
