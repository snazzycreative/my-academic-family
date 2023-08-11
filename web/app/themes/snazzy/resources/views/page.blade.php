@extends('layouts.app')

@section('content')
  <section class="section bg-white">
    @while(have_posts()) @php(the_post())
      <div class="container container-medium">
        @includeFirst(['partials.page-header-' . get_post_type(), 'partials.page-header'])
        @includeFirst(['partials.content-page', 'partials.content'])
      </div>
    @endwhile
  </section>
@endsection
