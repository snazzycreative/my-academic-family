@extends('single', ['banner' => 'none'])

@section('page-content')
  @include('partials.content-single-resource')
@endsection

@section('page-sidebar')
  <h2 class="section-title">{{ _e('Related Resources', 'sage') }}</h2>


@overwrite

