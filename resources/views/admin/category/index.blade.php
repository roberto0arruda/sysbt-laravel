@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <a href="{{route('admin.home')}}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
    <a href="{{route('products.create')}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Nova</a>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Categories</a></li>
    </ol>
@stop

@section('content')
<div class="box box-success">
    <div class="box-header text-center">
        <div class="box-title">Categories</div>
    </div>
    <div class="box-body table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">Title</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td class="text-center">{{ $category->title }}</td>
                    <td>
                        <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @empty
                <tr><td class="text-center" colspan="2">0 categorias</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@stop