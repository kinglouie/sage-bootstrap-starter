<a class="visually-hidden visually-hidden-focusable" href="#main">
  {{ __('Skip to content') }}
</a>

@include('sections.header')

<div class="container-xxl">
  @hasSection('sidebar')
  <div class="row">
    <div class="col-lg-9">
  @endif
  <main id="main" class="main">
    @yield('content')
  </main>
  @hasSection('sidebar')
    </div>
    <div class="col-lg-3">
      <aside class="sidebar">
        @yield('sidebar')
      </aside>
    </div>
  </div>
  @endif
</div>

@include('sections.footer')
