@extends('layouts.app')

@section('content')
  @includeFirst(['sections.banner.banner-' . get_post_type(), 'sections.banner.banner'])

  <section id="single-service-main" class="section bg-white">
    <div class="container single-service-main single-has-sidebar">
      <div class="single-content wysiwyg">
        @includeFirst(['partials.content-page', 'partials.content'])
      </div>
      <div class="section section-zero-bottom single-sidebar">
        @if($facilitators->have_posts())
          <h2 class="section-title">{{ _e('Facilitated by:', 'sage') }}</h2>
          @while($facilitators->have_posts()) @php $facilitators->the_post(); @endphp
            @include('partials.content-'.get_post_type().'-simple')
          @endwhile
          @php(wp_reset_query())
        @endif
      </div>
    </div>
  </section>
@endsection
