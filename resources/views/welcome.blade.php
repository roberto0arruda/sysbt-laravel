@extends('layouts.site')

@section('page-content')
  <header class="masthead bg-secondary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <h1 class="masthead-heading text-uppercase mb-0">{{ config('app.name', 'Laravel') }}</h1>

      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead">
            Cadastre-se, e começe a gerenciar o ser negó  cio, lance suas contas e conte com automações poderosas para gerenciar tudo enquanto você toma um bom café!
          </p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead">
            O sistema é totalmente online, não precisa instalação, funciona diretamente em qualquer dispositivo conectado, basta possir acesso a internet <i class="fas fa-cloud"></i></p>
        </div>
      </div>

      <p class="masthead-subheading font-weight-light mb-0">RÁPIDO | SIMPLES | GRATUITO</p>
      <div class="text-center mt-4">
        <a class="btn btn-xl btn-outline-light" href="{{ route('register') }}">
          <i class="fas fa-user-check mr-2"></i>
          Criar sua conta agora
        </a>
      </div>

    </div>
  </header>

  <section class="page-section portfolio" id="servicos">
    <div class="container">
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Serviços</h2>

      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <div class="row">

        <!-- Portfolio Item 1 -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portifolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="https://avatars1.githubusercontent.com/u/9919?v=4" alt="">
          </div>
        </div>

        <!-- Portfolio Item 2 -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="https://avatars1.githubusercontent.com/u/9919?v=4" alt="">
          </div>
        </div>

        <!-- Portfolio Item 3 -->
        <div class="col-md-6 col-lg-4">
          <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="portfolio-item-caption-content text-center text-white">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="https://avatars1.githubusercontent.com/u/9919?v=4" alt="">
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="page-section" id="contato">
    <div class="container">
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Me envie uma mensagem por aqui!
      </h2>

      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <div class="row">
        <div class="col-lg-8 mx-auto">
          <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nome</label>
                <input class="form-control" id="name" type="text" placeholder="Nome" required="required"
                  data-validation-required-message="Por favor, insira seu nome.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email</label>
                <input class="form-control" id="email" type="email" placeholder="Email" required="required"
                  data-validation-required-message="Por favor, indique o seu endereço de e-mail.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Telefone</label>
                <input class="form-control" id="phone" type="tel" placeholder="Telefone" required="required"
                  data-validation-required-message="Por favor, digite seu número de telefone.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Menssagem</label>
                <textarea class="form-control" id="message" rows="5" placeholder="Menssagem" required="required"
                  data-validation-required-message="Por favor, digite uma mensagem."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Enviar</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>
@endsection
