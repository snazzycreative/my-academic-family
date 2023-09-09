@extends('single', ['banner' => 'none'])

@section('page-content')
  @includeFirst(['partials.content-page', 'partials.content'])
@endsection

@section('page-sidebar')
  <h2 class="section-title">{{ _e('Related Resources', 'sage') }}</h2>


@overwrite

