<div class="{!! implode(' ', \App\section_container_classes($section)) !!}">
  @if(@$section['form'])
    {!! do_shortcode('[contact-form-7 id="'.$section['form'].'" submitted-page="'.get_the_title().'" submitted-url="'.get_the_permalink().'"]') !!}
  @endif
</div>
