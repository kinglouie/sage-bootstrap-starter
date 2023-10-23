<header class="header-default text-bg-dark">
  <nav class="navbar navbar-expand-xxl" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
    <div class="container-xxl position-relative">

      <a class="navbar-brand" href="{{ home_url('/') }}">
        <img alt="{!! $siteName !!}" src="@asset('images/logo.svg')" />
      </a>

      <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="offcanvasNavbar" class="offcanvas offcanvas-end text-bg-dark">
        <div class="offcanvas-header">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['depth' => 2, 'theme_location' => 'primary_navigation', 'menu_class' => 'navbar-nav navbar-dark', 'walker' => new \App\wp_bootstrap5_navwalker()]) !!}
          @endif
        </div>
      </div>
    </div>
  </nav>
</header>
