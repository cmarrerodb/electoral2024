@extends('adminlte::page')
@section('title','Trabajadores')
@section('content_header')
    <meta name="_token" content="{{ csrf_token() }}">
    <h1 class="m-0 text-dark">Trabajadores</h1>
@stop
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="mdl-trabajadores" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <label>VOTÓ</label><br/>
                            <label id="lbl_voto"></label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <label>HORA</label><br/>
                            <label id="lbl_hora"></label>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <label>ESTADO</label><br/>
                            <label id="lbl_estado"></label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <label>MUNICIPIO</label><br/>
                            <label id="lbl_municipio"></label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <label>PARROQUIA</label><br/>
                            <label id="lbl_parroquia"></label>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <label>GABINETE</label><br/>
                            <label id="lbl_gabinete"></label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <label>ENTE</label><br/>
                            <label id="lbl_ente"></label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <label>DEPENDENCIA</label><br/>
                            <label id="lbl_dependencia"></label>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3">
                            <label>TELÉFONO</label><br/>
                            <label id="lbl_telefono"></label>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8">
                            <label>OBSERVACIONES</label><br/>
                            <label id="lbl_observaciones"></label>
                        </div>
                    </div>
                    <hr/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="dismiss">Cerrar</button>
                    <button type="button" id="accept" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

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
            class="table table-hover" 
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
            data-show-multi-sort="true" 
            data-show-print="true" 
            data-locale="es-ES"
            data-search-accent-neutralise="true"
        >
            <thead>
                <tr>
                    <th colspan="13">LISTADOD DE TRABAJADORES</th>
                </tr>
                <tr>
                    <th data-formatter="operateFormatter" data-events="operateEvents"></th>
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
    <script src="{{ asset('/assets/libs/bootstrap/bootstrap.min.js') }}"></script>
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
        function operateFormatter(value, row, index) {
            let btns=[];
            @php
                $usrChk = auth()->check() && auth()->user()->can('admin.workers.check');
                $usrViw = auth()->check() && auth()->user()->can('admin.workers.view');
                $usrEdt = auth()->check() && auth()->user()->can('admin.workers.edit');
                $usrDes = auth()->check() && auth()->user()->can('admin.workers.destroy');
            @endphp

            @if($usrChk)
                btn_check = ['<form> @csrf <a class="chequear " href="javascript:void(0)" title="Chequear">',
                    '<i class="fas fa-check text-info"></i>',
                    '</a></form>  '].join('')
            @else
                btn_check = ''
            @endif            
            @if($usrViw)
                btn_view =['<a class="ver " href="javascript:void(0)" title="Ver">',
                        '<i class="fas fa-eye text-success"></i>',
                        '</a>  '].join('')
            @else
                btn_view = ''
            @endif            
            @if($usrEdt)
                btn_edit = ['<a class="editar " href="javascript:void(0)" title="Editar">',
                        '<i class="fas fa-edit text-primary"></i>',
                        '</a>  '].join('')
            @else
                btn_edit = ''
            @endif            
            @if($usrDes)
                btn_destroy = ['<a class="eliminar" href="javascript:void(0)" title="Eliminar">',
                        '<i class="fas fa-trash text-danger"></i>',
                        '</a>'].join('')
            @else
                btn_destroy = ''
            @endif            

            btns = [
                btn_check,btn_view,btn_edit,btn_destroy
            ].join('');
            return[btns];
            }
            window.operateEvents = {
                'click .chequear': function(e, value, row, index) {
                    //***************************** */
					Swal.fire({
						title: 'Ingrese la hora',
						html:
						'<input id="swal-input1" class="swal2-input" type="time" required>',
						showCancelButton: true,
						confirmButtonText: 'Aceptar',
						cancelButtonText: 'Cancelar',
						preConfirm: () => {
							const horaVoto = $('#swal-input1').val();
							if (!horaVoto) {
								Swal.showValidationMessage('Por favor ingrese la hora');
							}
							return horaVoto;
						}
					}).then((result) => {
						if (result.isConfirmed) {
                            var data = {
                                cedula: row['cedula'],
                                voto: 'SI',
                                hora_voto: result.value,
                            };
                            $.ajax({
                                type: "POST",
                                url: "/trabajador/check",
                                data: data,
                                headers: {
                                    "X-CSRF-Token": $('meta[name="_token"]').attr("content"),
                                },
                                dataType: "JSON",
                                success: function (response) {
                                    $('#tbl-trabajadores').bootstrapTable('refresh');
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'HORA REGISTRADA EXITOSAMENTE',
                                        showConfirmButton: 'Cerrar'
                                    });

                                },
                            });                    
						}
					});

                    //***************************** */
                    //////////////////
                    //////////////////  
                },
                'click .ver': function(e, value, row, index) {
                    $("#modal-title").html("Ficha del trabajador "+row['cedula']+" "+row["nombre"]);
                    $("#lbl_voto").html(row["voto"]);
                    $("#lbl_hora").html(row["hora_voto"]);
                    $("#lbl_estado").html(row["estado"]);
                    $("#lbl_municipio").html(row["municipio"]);
                    $("#lbl_parroquia").html(row["parroquia"]);
                    $("#lbl_gabinete").html(row["gabinete"]);
                    $("#lbl_ente").html(row["ente"]);
                    $("#lbl_dependencia").html(row["nombre_dependencia"]);
                    $("#lbl_telefono").html(row["telefono"]);
                    $("#lbl_observaciones").html(row["observaciones"]);
                    $("#dismiss").show();
                    $("#accept").hide();
                    $("#mdl-trabajadores").modal("show")
                },
                'click .editar': function(e, value, row, index) {
                    console.log('editar')
                    // Lógica para editar el registro
                },
                'click .eliminar': function(e, value, row, index) {
                    //***************************** */
					Swal.fire({
						title: 'ADVERTENCIA',
                        html: '¡Esta acción <strong style="color:#f00;">ELIMINARÁ AL TRABAJADOR</strong>! ¿Está seguro que desea continuar',
                        icon: 'warning',
						showCancelButton: true,
						confirmButtonText: 'Aceptar',
						cancelButtonText: 'Cancelar',
					}).then((result) => {
						if (result.isConfirmed) {
                            // var data = {
                            //     cedula: row['cedula'],
                            // };
                            $.ajax({
                                type: "DELETE",
                                url: "trabajadores/"+row['cedula'],
                                // data: data,
                                headers: {
                                    "X-CSRF-Token": $('meta[name="_token"]').attr("content"),
                                },
                                dataType: "JSON",
                                success: function (response) {
                                    console.log(response);
                                    $('#tbl-trabajadores').bootstrapTable('refresh');
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'TRABAJADOR ELIMINADO EXITOSAMENTE',
                                        text: 'El trabajador '+response.nombre+', CI '+ response.cedula+' ha sido borrado exitosamente',
                                        showConfirmButton: 'Cerrar'
                                    });

                                },
                            });                    
						}
					});

                    //***************************** */
                }
            };        
    </script>
@stop
