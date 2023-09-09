@extends('layouts.app')

@section('content')
  @if(@$banner != 'none')
    @includeFirst(['sections.banner.banner-' . @$banner ?: get_post_type(), 'sections.banner.banner'])
  @endif

  @if(get_the_content())
    <section id="single-{!! get_post_type() !!}-main" class="section bg-white">
      <div class="container single-{!! get_post_type() !!}-main @hasSection('page-sidebar') single-has-sidebar @endif">
        <div class="single-content wysiwyg">
          @yield('page-content')
        </div>

        @hasSection('page-sidebar')
          <div class="section section-zero-bottom single-sidebar">
            @yield('page-sidebar')
          </div>
        @endif
      </div>
    </section>
  @endif

  @hasSection('page-content-after')
    <div class="section-single-content-after">
      @yield('page-content-after')
    </div>
  @endif
@endsection
