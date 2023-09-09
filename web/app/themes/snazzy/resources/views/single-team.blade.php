@extends('layouts.app')

@section('banner')
  @includeFirst(['sections.banner.banner-' . get_post_type(), 'sections.banner.banner'])
@endsection

@section('content')
  <section class="section section-team-details bg-white">
    <div class="container container-small">
      @include('partials.entry-meta-team', ['h' => 1])
      {{ \snazzycp\frontend\post_social_channels() }}
      <hr/>

      <div class="section-team-content wysiwyg">
        @php(the_content())
      </div>

    </div>
  </section>
@endsection
