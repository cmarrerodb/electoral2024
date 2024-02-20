@extends('adminlte::page')
@section('title','Mostrar roles')
@section('content_header')
    <h1 class="m-0 text-dark">Asignar usuarios al rol <strong>{{$name}}</strong>; ID: <strong>{{$id}}</strong></h1>
@stop

@section('content')
<div class="card">
    <div>
        <form action="{{ route('admin.roles.assign', ['id' => $id]) }}" method="GET">
            <label for="recordsPerPage">Registros por página:</label>
            <select id="recordsPerPage" name="recordsPerPage" onchange="this.form.submit()">
                <option value="10" {{ $recordsPerPage == 10 ? 'selected' : ''}}>10</option>
                <option value="20" {{ $recordsPerPage == 20 ? 'selected' : ''}}>20</option>
                <option value="50" {{ $recordsPerPage == 50 ? 'selected' : ''}}>50</option>
                <option value="100" {{ $recordsPerPage == 100 ? 'selected' : ''}}>100</option>
                <option value="200" {{ $recordsPerPage == 200 ? 'selected' : ''}}>200</option>
                <option value="all"{{ $recordsPerPage == 'all' ? 'selected' : ''}}>Todos</option>
            </select>
        </form>
    </div>    
    <form action="{{ route('admin.roles.rol2user') }}" method="POST">
        @csrf
        @if ($recordsPerPage != 'all')
            <div class="pagination-info">
                {{ $users->links('vendor.pagination.custom') }}
            </div>
        @endif
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
    @if ($recordsPerPage != 'all' )
        <div class="pagination-info">
            {{ $users->links('vendor.pagination.custom') }}
        </div>
    @endif

</div>
@stop
@section('css')
@stop
@section('js')
@stop