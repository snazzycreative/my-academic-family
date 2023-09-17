  @if(!is_paged() && is_post_type_archive('event') && $upcomingQuery->have_posts())
    <section class="section seection-archive section-pagebuilder bg-secondary bg-pattern bg-pattern-white">
      <div class="section section-intro container align-centre knockout">
        <h2 class="section-title">{{ _e('Upcoming Events', 'sage') }}</h2>
      </div>
      <div class="container">
        <div class="grid grid-align-centre">
          @while($upcomingQuery->have_posts()) @php $upcomingQuery->the_post() @endphp
            @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
          @endwhile
          @php(wp_reset_query())
        </div>
      </div>
    </section>
  @endif
