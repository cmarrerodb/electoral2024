@extends('adminlte::page')
@section('title','Mostrar roles')
@section('content_header')
    <h1 class="m-0 text-dark">Asignar usuarios al rol <strong>{{$name}}</strong>; ID: <strong>{{$id}}</strong></h1>
@stop

@section('content')
<div class="card">
    <form action="{{ route('admin.roles.rol2user') }}" method="POST">
        @csrf
        <div class="pagination-info">
            {{ $users->links('vendor.pagination.custom') }}
        </div>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Asignado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <input type="checkbox" name="users[{{ $user->id }}]" value="1" {{ $user->roles->pluck('id')->first()==$id ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
    {{ $users->links('vendor.pagination.custom') }}
</div>
@stop
@section('css')
@stop
@section('js')
@stop