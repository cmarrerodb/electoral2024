@extends('adminlte::page')
@section('title','Listar permisos')
@section('content_header')
    <a href="{{route('admin.permissions.create')}}" class="btn btn-sm btn-success float-right" title="Crear permiso"><i class="fas fa-plus mr-3"></i>Crear permiso</a>
    <h1 class="m-0 text-dark">Listar permisos</h1>
@stop
@section('content')
    @if (session('info'))
        <div class="alert alert-danger">
            {{session('info')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ruta</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td>{{$permission->id}}</td>
                        <td>{{$permission->description}}</td>
                        <td>{{$permission->name}}</td>
                        <td width="10px">
                            <form action="{{route('admin.permissions.edit',$permission->id)}}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary float-right" title="Editar permiso">
                                    <i class="fas fa-edit"></i>
                                </button>                                
                            </form>                            
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.permissions.destroy',$permission)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger float-right" title="Eliminar rol">
                                    <i class="fas fa-trash"></i>
                                </button>                                
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