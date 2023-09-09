<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

@include('sections.menu-mobile.menu-mobile')

<div class="wrapper">
  @include('sections.header.header')

  @if(!is_front_page())
    <nav class="breadcrumb-wrap bg-grey-lightest">
      <div class="inner inner-small inner-zero-x container">
        {{ \snazzycp\frontend\breadcrumbs() }}
      </div>
    </nav>
  @endif

  @yield('banner')

  <main id="main" class="main">
    @yield('content')
  </main>

  @if(!is_paged())
    @include('partials.pagebuilder')
  @endif

  @include('sections.footer.footer')
</div>
