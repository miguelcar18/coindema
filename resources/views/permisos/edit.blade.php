@extends('layouts.base')

@section('titulo') Editar permiso @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Permisos</span> - Editar permiso</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li><a href="{{ URL::route('permisos.index') }}">Permisos</a></li>
					<li class="active">Editar permiso</li>
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
					<h6 class="panel-title">Editar permiso</h6>
				</div>
				<div class="panel-body">
					{!! Form::model($permiso, ['route' => ['permisos.update', $permiso->id], 'method' => 'PUT', 'class' => 'form-validate-general', 'id' => 'permisoForm']) !!}
						@include('permisos.form.permisoForm')
						<div class="text-right">
					    	{!! Form::button('Editar <i class="icon-arrow-right14 position-right"></i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'data' => '0', 'id' => 'submit']) !!}
					    </div>
					{!! Form::close() !!}
				</div>
			</div>
			<!-- /profile info -->
		</div>
	</div>
	<!-- /user profile -->
@stop