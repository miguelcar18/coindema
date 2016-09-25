@extends('layouts.base')

@section('titulo') Listado de registros @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Inventario</span> - Listado de registros</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li class="active">Listado de registros</li>
				</ul>
			</div>
		</div>
		<!-- /header content -->
	</div>
	<!-- /page header -->
@stop
@section('contenido')
	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Inventario registrado</h5>
		</div>
		<table class="table datatable-basic table-bordered table-striped table-hover" id="tabla">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Modelo</th>
					<th>Serial</th>
					<th>Cantidad</th>
					<th class="text-center" width="10%">Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($inventarios as $inventario)
				<tr>
					<td>{{ ucwords(strtolower(utf8_decode($inventario->producto))) }}</td>
					<td>{{ $inventario->modelo }}</td>
					<td>{{ $inventario->serial }}</td>
					<td class="text-right">{{ $inventario->cantidad }}</td>
					<td class="text-center">
						<a href="{{ URL::route('inventarios.show', $inventario->id) }}" data-rel="tooltip" title="Mostrar {{ $inventario->serial }}" objeto="{{ $inventario->serial }}"> 
                            <span class="btn btn-sm btn-info"> <i class="icon-eye"></i> </span> 
                        </a>
                        &nbsp;
                        <a href="{{ URL::route('inventarios.edit', $inventario->id) }}" class="tooltip-success editar" data-rel="tooltip" title="Editar {{ $inventario->serial }}" objeto="{{ $inventario->serial }}" style="text-decoration:none;"> 
                            <span class="btn btn-sm btn-warning"> <i class="icon-pencil7"></i> </span> 
                        </a>
                        &nbsp;
                        <a href="#" data-id="{{ $inventario->id }}" class="tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $inventario->serial }}" objeto="{{ $inventario->id }}"> 
                            <span class="btn btn-sm btn-danger"> <i class="icon-trash"></i> </span> 
                        </a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!! Form::open(array('route' => array('inventarios.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
        {!! Form::close() !!}
	</div>
	<!-- /basic datatable -->
@stop
@section('javascripts')
	<script type="text/javascript" src="{{ asset('assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/datatables_basic.js') }}"></script>
	<script type="text/javascript">
		$("#tabla").DataTable({
			language: {
	            lengthMenu: 		"Mostrar _MENU_ resultados por página",
                zeroRecords: 		"Sin resultados",
                info: 				"Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: 			"Sin ninguna información",
                infoFiltered: 		"(Filtrado de _MAX_ resultados totales)",
                search:         	"Buscar:",
                paginate: {
                    "first":      	"Primero",
                    "last":       	"Último",
                    "next":       	"Siguiente",
                    "previous": 	"Anterior"
                }
	        }
        });
        function mensaje(textoMensaje)
        {
            var alertMessage = '<div class="alert bg-success alert-styled-left">';
		    alertMessage+='<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Cerrar</span></button>';
		    alertMessage+='<span class="text-bold">Exito! </span> '+textoMensaje;
		    alertMessage+='</div>';
            return alertMessage;
        }
        @if(Session::has('message-alert'))
            var mensaje1 = "{{ Session::get('message-alert') }}";
            $('#respuesta').empty();
            $('#respuesta').html(mensaje(mensaje1));
            $('#respuesta').fadeIn();
            $('#respuesta').fadeOut(10000);
        @endif
        if ($('.tooltip-error').length)
        {
           $('.tooltip-error').click(function () {
                var message = "¿Está realmente seguro(a) de eliminar este registro?";
                var id = $(this).data('id');
                var form = $('#form-delete');
                var action = form.attr('action').replace('USER_ID', id);
                var row =  $(this).parents('tr');
                if(confirm(message))
                {
                    row.fadeOut(1000);
                    $.post(action, form.serialize(), function(result) {
                        if (result.success) {
                            setTimeout (function () {
                                row.delay(1000).remove();
                                var alertMessage = mensaje(result.msg);
                                $('#respuesta').html(alertMessage);
                                $('#respuesta').fadeIn();
                                $('#respuesta').fadeOut(10000);
                            }, 1000);                
                        } 
                        else 
                        {
                            row.show();
                        }
                    }, 'json');
                } 
           });
        }
	</script>
@stop