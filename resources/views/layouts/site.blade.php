<!DOCTYPE html>

<html>

<head>
  <title>{{ config('app.name', 'Laravel') }}</title>

  <meta charset="utf-8">
  <meta name="description" content="Site pessoal de Roberto Arruda.">
  <meta name="author" content="Roberto Arruda">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <style>
    /* Sticky Footer Classes */
    html,
    body {
      height: 100%;
    }

    #page-content {
      flex: 1 0 auto;
    }

    #sticky-footer {
      flex-shrink: none;
    }

    /* Other Classes for Page Styling */
    body {
      background: #007bff;
      background: linear-gradient(to right, #0062E6, #33AEFF);
    }
  </style>
</head>

<body class="is-preload d-flex flex-column" id="page-top">
  <div id="app">

    <!-- Navigation -->
    @include('includes.navbar')

    <main id="page-content">
      @yield('page-content')
    </main>

    <!-- Footer -->
    <footer id="sticky-footer" class="footer text-center py-4 bg-dark text-white-50">
      <div class="container">
        <div class="row">
          <!-- Footer Location -->
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Localização</h4>
            <p class="lead mb-0">Manaus, AM, Brasil</p>
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
    <!-- Copyright Section -->
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

  <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>

