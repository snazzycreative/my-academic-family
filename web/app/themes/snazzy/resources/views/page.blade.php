@extends('layouts.app')

@section('content')
  @includeFirst(['sections.banner.banner-' . get_post_type(), 'sections.banner.banner'])

  <section class="section bg-white">
    @while(have_posts()) @php(the_post())
      <div class="container container-medium">
        @includeFirst(['partials.content-page', 'partials.content'])
      </div>
    @endwhile
  </section>
@endsection
