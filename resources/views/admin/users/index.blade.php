@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <a href="{{route('admin.home')}}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

    <ol class="breadcrumb">
        <li><a href="">Dashboard</a></li>
        <li><a href="">Users</a></li>
    </ol>
@stop

@section('content')
<div class="box box-success">
    <div class="box-header text-center">Users</div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} @can('user_delete') dt-select @endcan">
            <thead>
                <tr>
                    @can('admin')
                    <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                    @endcan
                    <th>name</th>
                    <th>email</th>
                    <th>role</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>

            <tbody>
                @if (count($users) > 0)
                @foreach ($users as $user)
                <tr data-entry-id="{{ $user->id }}">
                    @can('admin')
                    <td></td>
                    @endcan
                    <td field-key='name'>{{ $user->name }}</td>
                    <td field-key='email'>{{ $user->email }}</td>
                    <td field-key='role'>
                        <span class="badge {{$user->role == 'admin' ? 'btn-success' : 'btn-danger'}}">
                            {{ $user->role }} {{--  ?? '' --}}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('users.show',[$user->id]) }}" class="tip btn btn-primary btn-xs">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        @can('admin')
                        <a href="{{ route('users.edit',[$user->id]) }}" class="tip btn btn-info btn-xs">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                        <form action="{{route('users.destroy', $user->id)}}" method="POST" style="display:inline">
                            @csrf
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="tip btn btn-danger btn-xs">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="10">no_entries_in_table</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop

@section('javascript')
    <script>
        @can('user_delete')
            window.route_mass_crud_entries_destroy = '{{ route('users.mass_destroy') }}';
        @endcan
    </script>
@endsection
