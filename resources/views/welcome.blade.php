@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-3">
      <h1 class="my-4">Shop Prainha</h1>
      <div class="list-group">
        <a href="#" class="list-group-item">Category 1</a>
        <a href="#" class="list-group-item">Category 2</a>
        <a href="#" class="list-group-item">Category 3</a>
      </div>
    </div><!-- /.col-lg-3 -->
    <div class="col-lg-9">
      <div id="carouselIndicators" class="carousel slide my-4" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselIndicators" data-slide-to="1"></li>
          <li data-target="#carouselIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="{{ url('images/vl-sistec-folder.png') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="row">
        @foreach ($products as $item)
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="{{ $item->photo1 ? asset('storage/products/'.$item->photo1) : 'http://placehold.it/700x400'}}" alt="{{ $item->title }}"></a>
            <div class="card-body">
              <h4 class="card-title"><a href="{{ str_replace(' ', '_', strtolower($item->title)) }}">{{ $item->title }}</a></h4>
              <h5>R$ {{ number_format($item->price, 2,',','.') }}</h5>
              <p class="card-text"><pre>{{ $item->description }}</pre></p>
            </div>
            <div class="card-footer">
              <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              <small class="text-muted float-right">&#10084;</small>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div><!-- /.col-lg-9 -->
  </div><!-- /.row -->
</div><!-- /.container -->
@endsection
