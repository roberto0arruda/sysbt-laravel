<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">
      <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-top" role="img" viewBox="0 0 24 24" focusable="false"><title>{{ config('app.name', 'Laravel') }}</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
      {{ config('app.name', 'Laravel') }}
    </a>

    <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
      type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
      aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item mx-0 mx-lg-1">
          <a href="/#page-top" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">Home</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
          <a href="/#servicos" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">Serviços</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
          <a href="/#sobre" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">Sobre</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
          <a href="/#contato" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">Contato</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
          <a href="/blog" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">Blog</a>
        </li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item mx-0 mx-lg-1">
          <a href="/shop" class="nav-link py-3 px-0 px-lg-3 rounded">Shop</a>
        </li>
        <!-- Authentication Links -->
        @guest
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <li class="nav-item  mx-0 mx-lg-1 dropdown">
            <a id="navbarDropdown" class="nav-link  py-3 px-0 px-lg-3 rounded dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/client">Painel</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
