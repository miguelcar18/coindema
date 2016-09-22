@extends('layouts.base')

@section('titulo') Agregar departamento @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Departamentos</span> - Agregar departamento</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li><a href="{{ URL::route('departamentos.index') }}">Departamentos</a></li>
					<li class="active">Agregar departamento</li>
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
					<h6 class="panel-title">Agregar departamento</h6>
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => 'departamentos.store', 'method' => 'POST', 'class' => 'form-validate-general', 'id' => 'departamentoForm']) !!}
						@include('departamentos.form.departamentoForm')
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