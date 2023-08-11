<nav class="menu-mobile bg-primary knockout border border-thick border-secondary border-left">
  <div class="menu-inner">
    <div class="inner">

      <a class="brand" href="{!! home_url() !!}">
        <img src="@asset('images/logo-my-academic-family-knockout.svg')" alt="My Academic Family Icon" width="85" height="58" />
      </a>

      @if (has_nav_menu('footer_navigation'))
        <nav class="nav-footer-wrap" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav-footer nolist', 'echo' => false]) !!}
        </nav>
      @endif
    </div>
  </div>
</nav>
<div class="close-menu js-close-menu"></div>
