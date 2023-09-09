@extends('layouts.app')

@section('banner')
  @include('sections.banner.banner')
@endsection

@section('content')
  <section class="section bg-white">
    @while(have_posts()) @php(the_post())
      <div class="container container-medium">
        @includeFirst(['partials.content-page', 'partials.content'])
      </div>
    @endwhile
  </section>
@endsection
