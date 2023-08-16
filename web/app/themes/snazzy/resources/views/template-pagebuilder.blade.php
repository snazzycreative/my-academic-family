{{--
  Template Name: Page Builder
  Template Post Type: page
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('sections.banner.banner')
  @endwhile
@endsection
