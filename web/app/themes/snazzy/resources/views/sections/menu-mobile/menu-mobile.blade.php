<nav class="menu-mobile bg-primary knockout">
  <div class="menu-inner">
    <div class="inner">
      @if (has_nav_menu('footer_navigation'))
        <nav class="nav-footer-wrap" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav-footer nolist', 'echo' => false]) !!}
        </nav>
      @endif
    </div>
  </div>
</nav>
