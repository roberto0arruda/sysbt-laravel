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
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="{{ $product->photo1 ? asset('storage/products/'.$product->photo1) : 'http://placehold.it//900x400'}}" alt="{{ $product->title }}">
            <div class="card-body">
              <h3 class="card-title">{{ $product->title }}</h3>
              <h4><span class="badge badge-pill badge-primary">R$ {{ number_format($product->price, 2, ',', '.') }}</span></h4>
              <p class="card-text">{{ $product->description }}</p>
              <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
              4.0 stars
            </div>
          </div>
          <!-- /.card -->
        </div>
    </div>
@endsection
