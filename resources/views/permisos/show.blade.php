@extends('layouts.base')

@section('titulo') Datos del permiso @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Permisos</span> - Mostrar datos</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li><a href="{{ URL::route('permisos.index') }}">Permisos</a></li>
					<li class="active">Datos del permiso</li>
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
			<h5 class="panel-title">Datos del permiso</h5>
		</div>
	</div>
    {!! Form::open(['route' => ['permisos.destroy', $permiso->id], 'method' =>'DELETE', 'id' => 'form-eliminar-permiso', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este permiso?\')']) !!}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-lg">
            <tbody>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Cédula:</b></td>
                    <td>{{ number_format($permiso->cedula, 0, '', '.') }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Nombre y apellido:</b></td>
                    <td>{{ $permiso->nombre }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Cargo:</b></td>
                    <td>{{ $permiso->cargo }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Tipo de personal:</b></td>
                    <td>{{ $permiso->tipo_personal }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Adscrito:</b></td>
                    <td>{{ $permiso->adscrito }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Tipo de permiso:</b></td>
                    <td>{{ $permiso->tipo_permiso }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Duración:</b></td>
                    <td>{{ $permiso->duracion }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Fecha requerida:</b></td>
                    <td>{{ $permiso->fecha_requerida }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Suplente:</b></td>
                    <td>{{ $permiso->suplente }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Estado:</b></td>
                    <td>{{ $permiso->aprobacion }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Acciones:</b></td>
                    <td>
                        <a href="{{ URL::route('permisos.edit', $permiso->id) }}" class="tooltip-success editar" data-rel="tooltip" objeto="{{$permiso->id}}" style="text-decoration:none;">
                            <span class="btn btn-success"> 
                                <i class="icon-pencil7"> Editar</i> 
                            </span>
                        </a>
                        &nbsp;
                        <a href="javascript:{}" class="tooltip-error borrar" data-rel="tooltip" objeto="{{$permiso->id}}" style="text-decoration:none;" onclick="return confirmSubmit(document.forms['form-eliminar-permiso'], '¿Está realmente seguro de eliminar este permiso?');">
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