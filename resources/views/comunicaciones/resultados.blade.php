@extends('layouts.base')

@section('titulo') Resultados consulta de comunicaciones @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Comunicaciones</span> - Listado de comunicaciones</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li class="active">Resultados de comunicaciones</li>
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
                Resultado de comunicaciones según consulta (
                    @if($orden != "")
                        Orden: {{ $orden }},
                    @endif 
                    @if($fecha != "")
                        {{--*/ $separar =  explode('-', $fecha) /*--}}
                        {{--*/ $fecham=  $separar[2].'/'.$separar[1].'/'.$separar[0] /*--}}
                        Fecha: {{ $fecham }}, 
                    @endif
                    @if($numero_oficio != "")
                        Oficio Nº: {{ $numero_oficio }}, 
                    @endif
                    @if($de != "")
                        De {{ $de }}, 
                    @endif
                    @if($para != "")
                        Para {{ $para }}, 
                    @endif
                    @if($asunto != "")
                        Asunto {{ $asunto }}
                    @endif
                )<br>
                Total de resultados: {{ count($comunicaciones) }} 
            </h5>
		</div>
		<table class="table datatable-basic" id="tabla">
			<thead>
				<tr>
					<th>Orden</th>
					<th>Fecha</th>
                    <th>Nº Oficio</th>
                    <th>De</th>
                    <th>Para</th>
                    <th>Asunto</th>
				</tr>
			</thead>
			<tbody>
				@foreach($comunicaciones as $comunicacion)
                {{--*/ $separar =  explode('-', $comunicacion->fecha) /*--}}
                {{--*/ $fechan=  $separar[2].'/'.$separar[1].'/'.$separar[0] /*--}}
				<tr>
					<td>{{ $comunicacion->orden }}</td>
					<td>{{ $fechan }}</td>
                    <td>{{ $comunicacion->numero_oficio }}</td>
                    <td>{{ $comunicacion->de }}</td>
                    <td>{{ $comunicacion->para }}</td>
                    <td>{{ $comunicacion->asunto }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
        {!! Form::open(['route' => 'comunicaciones.pdfResultados', 'method' => 'POST', 'class' => 'form-validate-general', 'target' => '_blank']) !!}
            <input type="hidden" name="orden" value="{{ $orden }}">
            <input type="hidden" name="fecha" value="{{ $fecha }}">
            <input type="hidden" name="numero_oficio" value="{{ $numero_oficio }}">
            <input type="hidden" name="de" value="{{ $de }}">
            <input type="hidden" name="para" value="{{ $para }}">
            <input type="hidden" name="asunto" value="{{ $asunto }}">
            @if(count($comunicaciones) > 0)
            <div class="text-right" style="padding: 20px 5px 20px 0">
                {!! Form::button('<i class="icon-file-pdf position-right"></i> Ver Archivo PDF', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'submit']) !!}
            </div>
            @endif
        {!! Form::close() !!}
	</div>
@stop