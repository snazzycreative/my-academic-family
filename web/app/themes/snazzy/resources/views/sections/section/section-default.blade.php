@extends('sections.section.section', $section)

@section('pagebuilder-block-content')
  <div class="container align-centre container-narrow wysiwyg">
    <h2 class="error">Template "{!! $section['acf_fc_layout'] !!}" not found.</h2>
  </div>
@overwrite
