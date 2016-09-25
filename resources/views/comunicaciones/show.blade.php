@extends('layouts.base')

@section('titulo') Datos de la comunicación @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Comunicaciones</span> - Mostrar datos</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li><a href="{{ URL::route('comunicaciones.index') }}">Comunicaciones</a></li>
					<li class="active">Datos de la comunicación</li>
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
			<h5 class="panel-title">Datos de la comunicación</h5>
		</div>
	</div>
    {!! Form::open(['route' => ['comunicaciones.destroy', $comunicacion->id], 'method' =>'DELETE', 'id' => 'form-eliminar-comunicacion', 'onSubmit' => 'return confirm(\'\\u00bfEst\\u00e1 realmente seguro(a) de eliminar esta comunicación?\')']) !!}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-lg">
            <tbody>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Orden:</b></td>
                    <td>{{ $comunicacion->orden }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Nº de oficio:</b></td>
                    <td>{{ $comunicacion->numero_oficio }}</td>
                </tr>
                <tr>
                    {{--*/ $separarFecha =  explode('-', $comunicacion->fecha) /*--}}
                    {{--*/ $fechaNormal=  $separarFecha[2].'/'.$separarFecha[1].'/'.$separarFecha[0] /*--}}
                    <td class="col-md-3 col-sm-4"><b>Fecha:</b></td>
                    <td>{{ $fechaNormal }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>De:</b></td>
                    <td>{{ $comunicacion->de }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Para:</b></td>
                    <td>{{ $comunicacion->para }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Asunto:</b></td>
                    <td>{{ $comunicacion->asunto }}</td>
                </tr>
                <tr>
                    <td class="col-md-3 col-sm-4"><b>Acciones:</b></td>
                    <td>
                        <a href="{{ URL::route('comunicaciones.edit', $comunicacion->id) }}" class="tooltip-success editar" data-rel="tooltip" objeto="{{$comunicacion->id}}" style="text-decoration:none;">
                            <span class="btn btn-success"> 
                                <i class="icon-pencil7"> Editar</i> 
                            </span>
                        </a>
                        &nbsp;
                        <a href="javascript:{}" class="tooltip-error borrar" data-rel="tooltip" objeto="{{$comunicacion->id}}" style="text-decoration:none;" onclick="return confirmSubmit(document.forms['form-eliminar-comunicacion'], '¿Está realmente seguro de eliminar esta comunicación?');">
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