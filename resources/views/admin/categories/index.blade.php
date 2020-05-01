@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
  <div class="row mb-2">
    <div class="col-sm-6">
      <a href="{{ route('categories.create') }}" class="btn btn-xs btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nova</a>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="breadcrumb-item active">Categories</li>
      </ol>
    </div>
  </div>
@stop

@section('content')
  <div class="card card-outline card-primary text-center">
    <div class="card-header">
      <h4 class="card-title">Categories</h4>
      <div class="card-tools">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
        <span class="badge badge-primary">Label</span>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th class="text-center">Title</th>
          <th class="text-center">Url</th>
          <th class="text-center" width="200px">#</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($categories as $category)
          <tr>
            <td class="text-center">{{ $category->title }}</td>
            <td class="text-center">{{ $category->url }}</td>
            <td>
              <a href="{{ route('categories.edit', $category->id) }}" class="badge badge-warning"><i class="fa fa-edit"></i> Editar</a>
              <a href="{{ route('categories.show', $category->id) }}" class="badge badge-info"><i class="fa fa-eye"></i> Detalhe</a>
            </td>
          </tr>
        @empty
          <tr>
            <td class="text-center" colspan="3">no categorias</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>
    <div class="card-footer text-muted">Categories footer to buttom paginate</div>
  </div>
@stop
