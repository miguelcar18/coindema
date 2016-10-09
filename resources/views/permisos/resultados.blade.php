@extends('layouts.base')

@section('titulo') Resultados consulta de permisos @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Permisos</span> - Listado de permisos</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li class="active">Resultados de permisos</li>
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
                Resultado de permisos según consulta (
                    @if($tipo_permiso != "")
                        Permisos {{ $tipo_permiso }},
                    @endif 
                    @if($desdeSql != "")
                        {{--*/ $separarDesde =  explode('-', $desdeSql) /*--}}
                        {{--*/ $fechaDesde=  $separarDesde[2].'/'.$separarDesde[1].'/'.$separarDesde[0] /*--}}
                        Desde el {{ $fechaDesde }}, 
                    @endif
                    @if($hastaSql != "")
                        {{--*/ $separarHasta =  explode('-', $hastaSql) /*--}}
                        {{--*/ $fechaHasta=  $separarHasta[2].'/'.$separarHasta[1].'/'.$separarHasta[0] /*--}}
                        Hasta el {{ $fechaHasta }}, 
                    @endif
                    @if($suplente != "")
                        @if($suplente == 1)
                            Con suplentes
                        @elseif($suplente == 0)
                            Sin suplentes
                        @endif
                    @endif
                    @if($aprobacion != "")
                        @if($aprobacion == 1)
                            Aprobados
                        @elseif($aprobacion == 0)
                            Reprobados
                        @endif
                    @endif
                )<br>
                Total de resultados: {{ count($permisos) }} 
            </h5>
		</div>
		<table class="table datatable-basic" id="tabla">
			<thead>
				<tr>
					<th>Cédula</th>
					<th>Nombre y apellido</th>
                    <th>Tipo de permiso</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                    <th>Estado</th>
				</tr>
			</thead>
			<tbody>
				@foreach($permisos as $permiso)
                {{--*/ $separarDesde =  explode('-', $permiso->desde) /*--}}
                {{--*/ $fechaDesde=  $separarDesde[2].'/'.$separarDesde[1].'/'.$separarDesde[0] /*--}}
                {{--*/ $separarHasta =  explode('-', $permiso->hasta) /*--}}
                    {{--*/ $fechaHasta=  $separarHasta[2].'/'.$separarHasta[1].'/'.$separarHasta[0] /*--}}
				<tr>
					<td>{{ number_format($permiso->cedula, 0, '', '.') }}</td>
					<td>{{ $permiso->nombre}}</td>
                    <td>{{ $permiso->tipo_permiso }}</td>
                    <td>{{ $fechaDesde }}</td>
                    <td>{{ $fechaHasta }}</td>
                    <td>
                        @if($permiso->aprobacion == 1)
                            Aprobado
                        @elseif($permiso->aprobacion == 0)
                            Rechazado
                        @endif
                    </td>
				</tr>
				@endforeach
			</tbody>
		</table>
        {!! Form::open(['route' => 'permisos.pdfResultados', 'method' => 'POST', 'class' => 'form-validate-general', 'target' => '_blank']) !!}
            <input type="hidden" name="tipo_permiso" value="{{ $tipo_permiso }}">
            <input type="hidden" name="desde" value="{{ $desdeSql }}">
            <input type="hidden" name="hasta" value="{{ $hastaSql }}">
            <input type="hidden" name="suplente" value="{{ $suplente }}">
            <input type="hidden" name="aprobacion" value="{{ $aprobacion }}">
            @if(count($permisos) > 0)
            <div class="text-right" style="padding: 20px 5px 20px 0">
                {!! Form::button('<i class="icon-file-pdf position-right"></i> Ver Archivo PDF', ['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'submit']) !!}
            </div>
            @endif
        {!! Form::close() !!}
	</div>
@stop