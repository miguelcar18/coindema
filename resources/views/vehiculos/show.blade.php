@extends('layouts.base')

@section('titulo') Datos del vehiculo @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Vehiculos</span> - Mostrar datos</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li><a href="{{ URL::route('vehiculos.index') }}">Vehiculos</a></li>
					<li class="active">Datos del vehiculo</li>
				</ul>
			</div>
		</div>
		<!-- /header content -->
	</div>
	<!-- /page header -->
@stop
@section('contenido')
	<!-- Basic table -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Datos del vehículo</h5>
		</div>
	</div>
    {!! Form::open(['route' => ['vehiculos.destroy', $vehiculo->id], 'method' =>'DELETE', 'id' => 'form-eliminar-vehiculo', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este vehiculo?\')']) !!}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-lg">
            <tbody>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Unidad:</b></td>
                    <td>{{ $vehiculo->unidad }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Marca:</b></td>
                    <td>{{ $vehiculo->marca }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Modelo:</b></td>
                    <td>{{ $vehiculo->modelo }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Placa:</b></td>
                    <td>{{ $vehiculo->placa }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Serial:</b></td>
                    <td>{{ $vehiculo->serial }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Carrocería:</b></td>
                    <td>{{ $vehiculo->carroceria }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Serial del motor:</b></td>
                    <td>{{ $vehiculo->serial_motor }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Color:</b></td>
                    <td>{{ $vehiculo->color }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Departamento:</b></td>
                    <td>{{ $vehiculo->nombreDepartamento->nombre }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Estado:</b></td>
                    <td>{{ $vehiculo->estado }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Acciones:</b></td>
                    <td>
                        <a href="{{ URL::route('vehiculos.edit', $vehiculo->id) }}" class="tooltip-success editar" data-rel="tooltip" objeto="{{$vehiculo->id}}" style="text-decoration:none;">
                            <span class="btn btn-success"> 
                                <i class="icon-pencil7"> Editar</i> 
                            </span>
                        </a>
                        &nbsp;
                        <a href="javascript:{}" class="tooltip-error borrar" data-rel="tooltip" objeto="{{$vehiculo->id}}" style="text-decoration:none;" onclick="return confirmSubmit(document.forms['form-eliminar-vehiculo'], '¿Está realmente seguro de eliminar este vehiculo?');">
                            <span class="btn btn-danger"> 
                                <i class="icon-trash">&nbsp;Eliminar</i> 
                            </span>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    {!! Form::close() !!}
	<!-- /basic table -->
@stop