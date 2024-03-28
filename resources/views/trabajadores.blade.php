@extends('adminlte::page')
@section('title','Trabajadores')
@section('content_header')
    <h1 class="m-0 text-dark">Trabajadores</h1>
@stop
@section('content')
    <div class="table-container">
        <div class="scrollup">
            <div class="text-center">
                <a href="#" class="bajar" title="Bajar al final de la tabla"><i class="fas fa-arrow-alt-circle-down" style="font-size: 18px;"></i></a>
            </div>
            <div class="text-center">
                <a href="#" class="subir" title="Subir al inicio de la tabla"><i class="fas fa-arrow-alt-circle-up" style="font-size: 18px;"></i></a>
            </div>
        </div>
        <table 
            id="tbl-trabajadores" 
            class="table table-dark table-hover" 
            data-toggle="table" 
            data-show-columns="true" 
            data-url="{{route('trab_tabla')}}" 
            data-side-pagination="server" 
            data-pagination="true" 
            data-page-list="[10, 20, 50,  100, 'All']" 
            data-page-size-options='["10", "20", "50", "100", "Todos"]' 
            data-custom-all-text="Todos"
            data-page-size-func="pageSizeFunc"
            data-page-size="10" 
            data-show-export="true" 
            data-export-data-type="all" 
            data-export-types="['csv', 'json', 'excel']" 
            data-show-fullscreen="true" 
            data-filter-control="true" 
            data-show-search-clear-button="true" 
            data-search="true" 
            data-show-multi-sort="true" 
            data-show-print="true" 
            data-locale="es-ES"
            data-search-accent-neutralise="true"
        >
            <thead>
                <tr><th colspan="12">LISTADO DE TRABAJADORES</th></tr>
                <tr>
                    <th data-field="cedula" data-filter-control="input" data-sortable="true">CEDULA</th>
                    <th data-field="nombre" data-filter-control="input" data-sortable="true">NOMBRE</th>
                    <th data-field="estado" data-filter-control="select" data-sortable="true">ESTADO</th>
                    <th data-field="municipio" data-filter-control="select" data-sortable="true">MUNICIPIO</th>
                    <th data-field="parroquia" data-filter-control="select" data-sortable="true">PARROQUIA</th>
                    <th data-field="gabinete" data-visible="false" data-filter-control="select" data-sortable="true">GABINETE</th>
                    <th data-field="ente" data-filter-control="select" data-sortable="true">ENTE</th>
                    <th data-field="nombre_dependencia" data-visible="false" data-filter-control="select" data-sortable="true">DEPENDENCIA</th>
                    <th data-field="telefono" data-visible="false">TELÉFONO</th>
                    <th data-field="voto"  data-visible="true" data-filter-control="select" data-sortable="true">VOTÓ</th>
                    <th data-field="observaciones" data-visible="false" data-filter-control="select" data-sortable="true">OBSERVACIONES</th>
                    <th data-field="hora_voto" data-visible="true" data-filter-control="select" data-sortable="true">HORA VOTO</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
@stop
@section('css')
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap-table.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap-table-group-by.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/choices.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/tui-chart/tui-chart.min.css') }}" rel="stylesheet">
@stop
@section('js')
<script src="{{ asset('/assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('/assets/libs/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jspdf.plugin.autotable.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table-locale-all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.3/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.3/dist/extensions/fixed-columns/bootstrap-table-fixed-columns.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.3/dist/extensions/multiple-sort/bootstrap-table-multiple-sort.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.3/dist/extensions/print/bootstrap-table-print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.3/dist/extensions/sticky-header/bootstrap-table-sticky-header.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.3/dist/bootstrap-table-locale-all.min.js"></script>    
    <script src="{{ asset('/assets/js/bootstrap-table/extensions/export/bootstrap-table-export.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table/extensions/export/tableExport.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table/extensions/export/xlsx.full.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table/extensions/fixed-columns/bootstrap-table-fixed-columns.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap-table-group-by.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery-ui-1.10.4.custom.min.js') }}"></script>
    <script src="{{ asset('/assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/tui-chart/tui-chart.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            setTimeout(() => {
                let todosElemento = $("a:contains('NaN')");
                todosElemento.first().text("Todos");
            }, 1000);
            $('.subir').click(function(){
                 $("html, body").animate({ scrollTop: 0 }, 600);
            });
            $(".bajar").click(function() {
                var tableHeight = $("#tbl-trabajadores")[0].scrollHeight;
                $("html, body").animate({ scrollTop: tableHeight }, 600);

            });  
        });
    </script>
@stop
