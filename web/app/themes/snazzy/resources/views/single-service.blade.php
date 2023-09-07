@extends('layouts.app')

@php
  $facilitators = new \WP_Query($team_args);
@endphp

@section('content')
  @includeFirst(['sections.banner.banner-service', 'sections.banner.banner'])

  @if(get_the_content())
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
  @endif
@endsection
