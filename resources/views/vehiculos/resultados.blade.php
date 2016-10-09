@extends('layouts.base')

@section('titulo') Resultados consulta de vehículos @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Vehiculos</span> - Listado de vehículos</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li class="active">Resultados de vehículos</li>
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
                Resultado de vehículos según consulta (
                    @if($unidad != "")
                        Unidad: {{ $unidad }},
                    @endif 
                    @if($marca != "")
                        Marca: {{ $marca }}, 
                    @endif
                    @if($modelo != "")
                        Modelo: {{ $modelo }}, 
                    @endif
                    @if($placa != "")
                        Placa: {{ $placa }}, 
                    @endif
                    @if($color != "")
                        Color: {{ $color }}, 
                    @endif
                    @if($departamento != "")
                        Departamento: {{ $nombreDep }}
                    @endif
                )<br>
                Total de resultados: {{ count($vehiculos) }} 
            </h5>
		</div>
		<table class="table datatable-basic" id="tabla">
			<thead>
				<tr>
					<th>Unidad</th>
					<th>Marca</th>
                    <th>Modelo</th>
                    <th>Placa</th>
                    <th>Color</th>
                    <th>Departamento</th>
				</tr>
			</thead>
			<tbody>
				@foreach($vehiculos as $vehiculo)
				<tr>
					<td>{{ $vehiculo->unidad }}</td>
					<td>{{ $vehiculo->marca }}</td>
                    <td>{{ $vehiculo->modelo }}</td>
                    <td>{{ $vehiculo->placa }}</td>
                    <td>{{ $vehiculo->color }}</td>
                    <td>{{ $vehiculo->nombreDepartamento->nombre }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
        {!! Form::open(['route' => 'vehiculos.pdfResultados', 'method' => 'POST', 'class' => 'form-validate-general', 'target' => '_blank']) !!}
            <input type="hidden" name="unidad" value="{{ $unidad }}">
            <input type="hidden" name="marca" value="{{ $marca }}">
            <input type="hidden" name="modelo" value="{{ $modelo }}">
            <input type="hidden" name="placa" value="{{ $placa }}">
            <input type="hidden" name="serial" value="{{ $serial }}">
            <input type="hidden" name="carroceria" value="{{ $carroceria }}">
            <input type="hidden" name="serial_motor" value="{{ $serial_motor }}">
            <input type="hidden" name="color" value="{{ $color }}">
            <input type="hidden" name="departamento" value="{{ $departamento }}">
            <input type="hidden" name="estado" value="{{ $estado }}">
            @if(count($vehiculos) > 0)
            <div class="text-right" style="padding: 20px 5px 20px 0">
                {!! Form::button('<i class="icon-file-pdf position-right"></i> Ver Archivo PDF', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'submit']) !!}
            </div>
            @endif
        {!! Form::close() !!}
	</div>
@stop