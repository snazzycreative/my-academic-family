@if($slides->have_posts())
  <section class="section-hero">
    @if($count)
      <div class="js-hero-slider glide bg-black">
        <div class="glide__track" data-glide-el="track">
          <div class="glide__slides">
        @endif
            @php $x = 0 @endphp
            @while($slides->have_posts()) @php $slides->the_post() @endphp
              @include('sections.slides.slide', [
                'x' => $x,
                'glidejs' => ($count) ? true : false,
              ])
              @php($x++)
            @endwhile

        @if($count)

          </div>
        </div>

        <div class="banner-slide-nav">
          <ul class="glide__bullets nolist align-centre" data-glide-el="controls[nav]">
            @foreach(range(0, $count) as $x)
              <li class="glide__bullet" data-glide-dir="=<?= $x ?>"><i></i></li>
            @endforeach
            @php(wp_reset_query())
          </ul>
        </div>
      </div>
    @endif

    @include('partials.quicklinks', ['quicklinks' => $quicklinks])
  </section>
@endif

@php(wp_reset_query())
