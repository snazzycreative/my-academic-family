@if(@$section['form'])
  @extends('sections.section.section', $section)

  @section('pagebuilder-block-content')
    <div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
      {!! do_shortcode('[contact-form-7 id="'.$section['form'].'" submitted-page="'.get_the_title().'" submitted-url="'.get_the_permalink().'"]') !!}
    </div>
  @overwrite
@endif
