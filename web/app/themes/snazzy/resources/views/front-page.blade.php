@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('sections.banner.banner')
    @if(get_the_content())
      <section class="section section-content bg-white">
        <div class="container container-small">
          @includeFirst(['partials.content-page', 'partials.content'])
        </div>
      </section>
    @endif
    @include('partials.pagebuilder')
  @endwhile
@endsection
