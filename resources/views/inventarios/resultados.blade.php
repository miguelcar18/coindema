@extends('layouts.base')

@section('titulo') Resultados consulta de registros inventario @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Inventario</span> - Listado de registros</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li class="active">Resultados de inventario</li>
				</ul>
			</div>
		</div>
		<!-- /header content -->
	</div>
	<!-- /page header -->
@stop
@section('contenido')
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">
                Resultado de inventario según consulta (
                    @if($producto != "")
                        Producto: {{ $producto }},
                    @endif 
                    @if($modelo != "")
                        Modelo: {{ $modelo }}, 
                    @endif
                    @if($marca != "")
                        Marca: {{ $marca }}, 
                    @endif
                    @if($cantidad != "")
                        Cantidad: {{ $cantidad }}, 
                    @endif
                    @if($serial != "")
                        Serial: {{ $serial }}, 
                    @endif
                    @if($departamento != "")
                        Departamento: {{ $nombreDep }}
                    @endif
                )<br>
                Total de resultados: {{ count($inventarios) }} 
            </h5>
		</div>
		<table class="table datatable-basic" id="tabla">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Modelo</th>
                    <th>Marca</th>
                    <th>Cantidad</th>
                    <th>Serial</th>
                    <th>Departamento</th>
				</tr>
			</thead>
			<tbody>
				@foreach($inventarios as $inventario)
				<tr>
					<td>{{ ucwords(strtolower($inventario->producto)) }}</td>
					<td>{{ $inventario->modelo }}</td>
                    <td>{{ $inventario->marca }}</td>
                    <td>{{ $inventario->cantidad }}</td>
                    <td>{{ $inventario->serial }}</td>
                    <td>{{ $inventario->nombreDepartamento->nombre }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
        {!! Form::open(['route' => 'inventarios.pdfResultados', 'method' => 'POST', 'class' => 'form-validate-general', 'target' => '_blank']) !!}
            <input type="hidden" name="producto" value="{{ $producto }}">
            <input type="hidden" name="modelo" value="{{ $modelo }}">
            <input type="hidden" name="marca" value="{{ $marca }}">
            <input type="hidden" name="cantidad" value="{{ $cantidad }}">
            <input type="hidden" name="serial" value="{{ $serial }}">
            <input type="hidden" name="departamento" value="{{ $departamento }}">
            @if(count($inventarios) > 0)
            <div class="text-right" style="padding: 20px 5px 20px 0">
                {!! Form::button('<i class="icon-file-pdf position-right"></i> Ver Archivo PDF', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'submit']) !!}
            </div>
            @endif
        {!! Form::close() !!}
	</div>
@stop