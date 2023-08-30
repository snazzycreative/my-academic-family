@extends('layouts.app')

@section('content')

  @include('sections.banner.banner', ['post' => $post])

  <section class="section section-archive bg-primary bg-pattern bg-pattern-white">
    <div class="container">

      @if (have_posts())
        <div class="grid grid-4 grid-left">

          @while(have_posts()) @php(the_post())
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
          @endwhile

        </div>

        {!! get_the_posts_navigation() !!}
      @endif

    </div>
  </section>

@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection

    {{-- <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!} --}}
