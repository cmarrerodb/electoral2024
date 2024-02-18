@extends('adminlte::page')
@section('title','Listar roles')
@section('content_header')
    <a href="{{route('admin.roles.create')}}" class="btn btn-sm btn-success float-right" title="Crear rol"><i class="fas fa-plus mr-3"></i>Crear rol</a>
    <h1 class="m-0 text-dark">Listar roles</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Rol</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td width="10px">
                            <a href="{{route('admin.roles.edit',$role)}}" class="btn btn-sm btn-primary float-right" title="Editar"><i class="fas fa-edit"></i>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('admin.roles.destroy',$role)}}" class="btn btn-sm btn-danger float-right" title="Eliminar"><i class="fas fa-trash"></i>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('css')
@stop
@section('js')
@stop