@extends('layouts.base')

@section('titulo') Agregar vehiculo @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Vehiculos</span> - Agregar vehiculo</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li><a href="{{ URL::route('vehiculos.index') }}">Vehiculos</a></li>
					<li class="active">Agregar vehiculo</li>
				</ul>
			</div>
		</div>
		<!-- /header content -->
	</div>
	<!-- /page header -->
@stop
@section('contenido')
	<!-- User profile -->
	<div class="row">
		<div class="col-lg-12">
			<!-- Profile info -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h6 class="panel-title">Agregar vehiculo</h6>
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => 'vehiculos.store', 'method' => 'POST', 'class' => 'form-validate-general', 'id' => 'vehiculoForm']) !!}
						@include('vehiculos.form.vehiculosForm')
						<div class="text-right">
					    	{!! Form::button('Agregar <i class="icon-arrow-right14 position-right"></i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'data' => '1', 'id' => 'submit']) !!}
					    </div>
					{!! Form::close() !!}
				</div>
			</div>
			<!-- /profile info -->
		</div>
	</div>
	<!-- /user profile -->
@stop