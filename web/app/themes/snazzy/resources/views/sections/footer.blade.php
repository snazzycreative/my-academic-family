<footer class="content-info bg-primary knockout">
  <div class="section container">

    <a class="brand brand-icon" href="{!! home_url() !!}">
      <img src="@asset('images/icon-my-academic-family-knockout-cold.svg')" alt="My Academic Family Icon" width="85" height="58" />
    </a>

    @if (has_nav_menu('footer_navigation'))
      <nav class="nav-footer" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav nolist', 'echo' => false]) !!}
      </nav>
    @endif
  </div>

  <div class="subfooter section-small">
    <div class="container">
      {{ \snazzycp\frontend\copyright() }}

      @if($privacy)
      <div class="privacy">
        <p><span>|</span> {!! $privacy !!}</p></p>
      </div>
      @endif

    </div>
  </div>
</footer>
