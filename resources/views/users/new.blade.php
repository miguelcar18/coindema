@extends('layouts.base')

@section('titulo') Agregar usuario @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Usuarios</span> - Agregar usuario</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li><a href="{{ URL::route('users.index') }}">Usuarios</a></li>
					<li class="active">Agregar usuario</li>
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
		<div class="col-lg-8 col-lg-offset-2">
			<div class="tabbable">
				<div class="tab-content">
					@if(Auth::user()->rol == 1) 
						<div class="tab-pane fade active in" id="editar_perfil">
							<!-- Profile info -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Agregar usuario</h6>
								</div>
								<div class="panel-body">
									{!! Form::open(['route' => 'users.store', 'method' => 'POST', 'class' => 'form-validate-general', 'files' => true, 'id' => 'addUserForm']) !!}
										@include('users.form.createForm')
										<div class="text-right">
									    	{!! Form::button('Agregar <i class="icon-arrow-right14 position-right"></i>', ['type' => 'submit', 'class' => 'btn btn-primary', ]) !!}
									    </div>
									{!! Form::close() !!}
								</div>
							</div>
							<!-- /profile info -->
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!-- /user profile -->
@stop