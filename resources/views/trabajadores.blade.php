@extends('adminlte::page')
@section('title','Trabajadores')
@section('content_header')
    <h1 class="m-0 text-dark">Trabajadores</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" striped hoverable  with-buttons>
                        @foreach($trabajadores as $trabajador)
                                <td>
                                    <!-- <button type="button" class="btn btn-dark btn-sm btn-ver"><i class="fas fa-eye"></i></button> -->
                                    <button type="button" class="btn btn-primary btn-sm btn-editar" title="Editar"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm btn-eliminar" title="Eliminar"><i class="fas fa-trash"></i></button>
                                </td>
                                <td>{{$trabajador->cedula }}</td>
                                <td>{{$trabajador->nombre }}</td>
                                <td>{{$trabajador->estado }}</td>
                                <td>{{$trabajador->municipio }}</td>
                                <td>{{$trabajador->circuito }}</td>
                                <td>{{$trabajador->parroquia }}</td>
                                <td>{{$trabajador->gabinete }}</td>
                                <td>{{$trabajador->ente }}</td>
                                <td>{{$trabajador->nombre_dependencia }}</td>
                                <td>{{$trabajador->telefono }}</td>
                                <td>{{$trabajador->voto }}</td>
                                <td>{{$trabajador->movilizacion }}</td>
                                <td>{{$trabajador->hora_voto }}</td>
                                <td>{{$trabajador->observaciones }}</td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop
