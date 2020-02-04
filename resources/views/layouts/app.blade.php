<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-top" role="img" viewBox="0 0 24 24" focusable="false"><title>VL</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location -->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Localização</h4>
                        <p class="lead mb-0">http://sysbt.herokuapp.com
                            <br>Prainha <small>em Breve</small></p>
                    </div>

                    <!-- Footer Social Icons -->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Redes Sociais</h4>
                        <a class="btn btn-outline-light btn-social mx-1" target="_blank"href="https://www.facebook.com/vlsistec/">
                            <i class="fab fa-fw fa-facebook-f"></i>
                        </a>
                        |
                        <a class="btn btn-outline-light btn-social mx-1" target="_blank"href="https://www.facebook.com/VLSISTECPRAINHA/">
                            <i class="fab fa-fw fa-facebook-f"></i>
                        </a>
                    </div>

                    <!-- Footer About Text -->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Sobre Nós</h4>
                        <p class="lead mb-0">VL prainha é a primeira loja online da sua região,
                            atendemos exclusivamente Prainha-PA. Criada com <i class="fas fa-heart" style="color:red" aria-hidden="true"></i> por
                            <a href="#">Roberto e Tatiane</a> Arruda
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <section class="copyright py-4 text-center text-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center text-white">
                        <a href="{{ asset('/') }}">
                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="84.1" height="57.6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-top" role="img" viewBox="0 0 24 24" focusable="false"><title>VL</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
                        </a>
                        <p></p>
                        <p>&copy; {{ date('Y') }} VL / Prainha - CNPJ 33.742.464.0001/22</p>
                        <p>Todos os direitos reservados</p>
                    </div>
                </div>
            </div>
            <div class="container copyright">
                <div class="row group text-center text-white">
                    <div class="col-xs-12 col-sm-6 item middle">
                        <small>Desenvolvido com <i class="fas fa-heart" style="color:red" aria-hidden="true"></i> por
                            <a href="https://github.com/roberto0arruda/" target="_blank">
                                <i class="fab fa-fw fa-github-alt" aria-hidden="true"></i> Roberto Arruda
                            </a>
                        </small>
                    </div>
                    <div class="col-xs-12 col-sm-6 item middle links">
                        <small>Redes Sociais:</small>
                        <a href="https://www.facebook.com/roberto0arruda" target="_blank">
                            <i class="fab fa-fw fa-facebook-f" arial-hidden="true"></i>
                        </a>
                        <a href="https://www.instagram.com/roberto0arruda" target="_blank">
                            <i class="fab fa-fw fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="https://www.twitter.com/roberto0arruda" target="_blank">
                            <i class="fab fa-fw fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="https://linkedin.com/in/roberto0arruda/" target="_blank">
                            <i class="fab fa-fw fa-linkedin-in" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
