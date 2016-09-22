@extends('layouts.base')

@section('titulo') Datos del registro @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Inventario</span> - Mostrar datos</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li><a href="{{ URL::route('inventarios.index') }}">Inventario</a></li>
					<li class="active">Datos del registro</li>
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
			<h5 class="panel-title">Datos del registro</h5>
		</div>
	</div>
    {!! Form::open(['route' => ['inventarios.destroy', $inventario->id], 'method' =>'DELETE', 'id' => 'form-eliminar-inventario', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar este registro?\')']) !!}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-lg">
            <tbody>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Producto:</b></td>
                    <td>{{ $inventario->producto }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Modelo:</b></td>
                    <td>{{ $inventario->modelo }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Marca:</b></td>
                    <td>{{ $inventario->marca }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Cantidad:</b></td>
                    <td>{{ $inventario->cantidad }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Serial:</b></td>
                    <td>{{ $inventario->serial }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Departamento:</b></td>
                    <td>{{ $inventario->nombreDepartamento->nombre }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Observaciones:</b></td>
                    <td>{{ $inventario->observaciones }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Acciones:</b></td>
                    <td>
                        <a href="{{ URL::route('inventarios.edit', $inventario->id) }}" class="tooltip-success editar" data-rel="tooltip" objeto="{{$inventario->id}}" style="text-decoration:none;">
                            <span class="btn btn-success"> 
                                <i class="icon-pencil7"> Editar</i> 
                            </span>
                        </a>
                        &nbsp;
                        <a href="javascript:{}" class="tooltip-error borrar" data-rel="tooltip" objeto="{{$inventario->id}}" style="text-decoration:none;" onclick="return confirmSubmit(document.forms['form-eliminar-inventario'], '¿Está realmente seguro de eliminar este registro?');">
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