<header class="menu-fixed">
  <div class="topbar bg-secondary knockout">
    <div class="container section-smallest">
      <div class="topbar-social">
        @include('partials.menu-social')
      </div>

      @if (has_nav_menu('secondary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('secondary_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav-menu nav-secondary nolist', 'echo' => false]) !!}
        </nav>
      @endif
    </div>
  </div>
  <div class="bottombar bg-white section-smallest">
    <div class="container">
      <a class="brand" href="{{ home_url('/') }}">
        {!! $logo !!}
      </a>

      @if (has_nav_menu('primary_navigation'))
        <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-menu nav-primary nolist', 'echo' => false]) !!}
        </nav>
      @endif

      <button class="block menu-toggle js-menu-toggle">
        @foreach(range(0, 2) as $i)
          <i></i>
        @endforeach
        <span class="visually-hidden">Toggle Mobile Menu</span>
      </button>
    </div>
  </div>
</header>
