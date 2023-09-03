@if($slides->have_posts())
  <section class="section-hero">
    @if($count)
      <div class="js-hero-slider glide">
        <div class="glide__track" data-glide-el="track">
          <div class="glide__slides">
        @endif

            @while($slides->have_posts()) @php $slides->the_post() @endphp
              @include('sections.slides.slide')
            @endwhile

        @if($count)

          </div>
        </div>

        <div class="glide__bullets" data-glide-el="controls[nav]">
          @foreach(range(0, $count) as $x)
            <button class="glide__bullet" data-glide-dir="=<?= $x ?>"></button>
          @endforeach
        </div>
      @endif

    </div>
  </section>

  @php(wp_reset_query())
@endif
