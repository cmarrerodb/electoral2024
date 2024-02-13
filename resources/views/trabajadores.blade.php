@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Trabajadores</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-adminlte-datatable id="table1" :heads="$heads">
                        <!-- @foreach($config['data'] as $row) -->
                        @foreach($trabajadores as $row)
                            <tr>
                            <td>{{$trabajador->cedula }}</td>,
                    <td>{{$trabajador->nombre }}</td>,
                    <td>{{$trabajador->id_estado }}</td>,
                    <td>{{$trabajador->id_municipio }}</td>,
                    <td>{{$trabajador->id_circuito }}</td>,
                    <td>{{$trabajador->id_parroquia }}</td>,
                    <td>{{$trabajador->id_gabinete }}</td>,
                    <td>{{$trabajador->id_ente }}</td>,
                    <td>{{$trabajador->id_dependencia }}</td>,
                    <td>{{$trabajador->telfono }}</td>,
                    <td>{{$trabajador->voto }}</td>,
                    <td>{{$trabajador->1x10 }}</td>,
                    <td>{{$trabajador->observaciones }}</td>,
                    <td>{{$trabajador->hora_voto }}</td>,
                    <td>{{$trabajador->created_at }}</td>,
                    <td>{{$trabajador->updated_at }}</td>,
                    <td>{{$trabajador->deleted_at }}</td>,
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop
