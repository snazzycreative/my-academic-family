@extends('layouts.single', ['banner' => 'none'])

@section('page-content')
  @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
@endsection

@if($related)
  @section('page-sidebar')
    <h2 class="section-title">{!! $related_heading !!}</h2>
  @overwrite
@endif

