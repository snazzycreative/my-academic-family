@extends('layouts.app')

@section('banner')
  @include('sections.banner.banner')
@endsection

@section('content')
  @includeFirst(['partials.archive-before-' . get_post_type(), 'partials.archive-before'])

  @if (have_posts())
    <section class="section section-archive section-pagebuilder {!! implode(' ', $bgClasses) !!}">
      @includeFirst(['partials.archive-subheading-' . get_post_type(), 'partials.archive-subheading'])

      <div class="container">
        <div class="grid grid-4 grid-left">
          @while(have_posts()) @php(the_post())
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
          @endwhile
        </div>

        <div class="section section-footer align-centre knockout">
          {!! get_the_posts_navigation() !!}
        </div>

      </div>
    </section>
  @endif
@endsection
