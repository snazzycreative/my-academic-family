@extends('layouts.app')

@section('banner')
  @if(is_front_page())
    @include('sections.slides.slides')
  @else
    @include('sections.banner.banner')
  @endif
@endsection

@section('content')
  @if(get_the_content())
    <section class="section section-content bg-white">
      <div class="container container-small">
        @includeFirst(['partials.content-page', 'partials.content'])
      </div>
    </section>
  @endif
@endsection
