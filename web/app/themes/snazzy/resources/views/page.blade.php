@extends('layouts.app')

@section('content')
  @include('sections.banner.banner')

  <section class="section bg-white">
    @while(have_posts()) @php(the_post())
      <div class="container container-medium">
        @includeFirst(['partials.content-page', 'partials.content'])
      </div>
    @endwhile
  </section>
@endsection
