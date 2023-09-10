@extends('layouts.single', ['banner' => 'service'])

@php
  $facilitators = new \WP_Query($team_args);
@endphp

@section('page-content')
  @includeFirst(['partials.content-page', 'partials.content'])
@endsection

@section('page-sidebar')
  @if($facilitators->have_posts())
    <h2 class="section-title">{{ _e('Facilitated by:', 'sage') }}</h2>
    @while($facilitators->have_posts()) @php $facilitators->the_post(); @endphp
      @include('partials.content-'.get_post_type().'-simple')
    @endwhile
  @endif
@overwrite

@php(wp_reset_query())
