@if($slides->have_posts())
  @while($slides->have_posts()) @php $slides->the_post() @endphp
    <section class="section-hero glide">
      <div class="glide__track">
        <div class="glide_slides">
          @include('sections.slides.slide')
        </div>
      </div>
    </section>
  @endwhile

  @php(wp_reset_query())
@endif
