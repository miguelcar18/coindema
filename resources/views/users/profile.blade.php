@extends('layouts.base')

@section('titulo') Mi perfil @stop

@section('cabecera-contenido')
	<!-- Page header -->
	<div class="page-header">
		<!-- Header content -->
		<div class="page-header-content">
			<div class="page-title">
				<h4><span class="text-semibold">Usuarios</span> - Mi perfil</h4>
				<ul class="breadcrumb position-right">
					<li><a href="{{ URL::route('dashboard') }}">Inicio</a></li>
					<li><a href="{{ URL::route('users.index') }}">Usuarios</a></li>
					<li class="active">Mi perfil</li>
				</ul>
			</div>
		</div>
		<!-- /header content -->
		<!-- Toolbar -->
		<div class="navbar navbar-default navbar-component navbar-xs">
			<ul class="nav navbar-nav visible-xs-block">
				<li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
			</ul>
			<div class="navbar-collapse collapse" id="navbar-filter">
				<ul class="nav navbar-nav element-active-slate-400">
					@if(Auth::user()->rol == 1 || Auth::user()->id == $id)        
						<li class="active"><a href="#mostrar_perfil" data-toggle="tab"><i class="icon-user-check position-left"></i> Mis datos</a></li>
						<li><a href="#editar_perfil" data-toggle="tab"><i class="icon-pencil7 position-left"></i> Editar datos</a></li>
					@endif
					@if(Auth::user()->id == $id)
						<li><a href="#change_password" data-toggle="tab"><i class="icon-lock2 position-left"></i> Cambiar contraseña</a></li>
					@endif
				</ul>
			</div>
		</div>
		<!-- /toolbar -->
	</div>
	<!-- /page header -->
@stop
@section('contenido')
	<!-- User profile -->
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<div class="tabbable">
				<div class="tab-content">
					@if(Auth::user()->rol == 1 || Auth::user()->id == $id) 
						<div class="tab-pane fade active in" id="mostrar_perfil">
							<!-- User thumbnail -->
							<div class="thumbnail">
								<div class="thumb thumb-rounded thumb-slide">
									@if($user->path == '')
			                            <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="" width="50px" height="auto">
			                        @else
			                        	<img src="{{ asset('uploads/users/'.$user->path) }}" alt="" width="50px" height="auto">
			                        @endif
								</div>
						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin">	{{ $user->name }} 
						    			<small class="display-block">
						    				@if($user->rol == 1)
				                                Administrador
				                            @elseif($user->rol == 0)
				                                Usuario
				                            @endif		
						    			</small>
					    			</h6>
						    	</div>
					    	</div>
					    	<!-- /user thumbnail -->
							<!-- Navigation -->
					    	<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Datos del usuario</h6>
								</div>
								<div class="list-group list-group-borderless no-padding-top">
									<p class="list-group-item"><i class="icon-vcard"></i> {{ $user->username }}</p>
									<p class="list-group-item"><i class="icon-user"></i> {{ $user->name }}</p>
									<p class="list-group-item"><i class="icon-mail5"></i> {{ $user->email }}</p>
									<p class="list-group-item">
										<i class="icon-medal"></i> 
										@if($user->rol == 1)
			                                Administrador
			                            @elseif($user->rol == 0)
			                                Usuario
			                            @endif
									</p>
									@if($user->details != "")
										<p class="list-group-item"><i class="icon-bubble-lines4"></i> {{ $user->details }}</p>
									@endif
								</div>
							</div>
							<!-- /navigation -->
						</div>
						<div class="tab-pane fade" id="editar_perfil">
							<!-- Profile info -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Editar perfil</h6>
								</div>
								<div class="panel-body">
									{!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'class' => 'form-validate-general', 'files' => true, 'id' => 'editUserForm']) !!}
										@include('users.form.editForm')
										<div class="text-right">
									    	{!! Form::button('Actualizar <i class="icon-arrow-right14 position-right"></i>', ['type' => 'submit', 'class' => 'btn btn-primary', ]) !!}
									    </div>
									{!! Form::close() !!}
								</div>
							</div>
							<!-- /profile info -->
						</div>
					@endif
					@if(Auth::user()->id == $id) 
						<div class="tab-pane fade" id="change_password">
							<!-- Account settings -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Cambiar contraseña</h6>
								</div>
								<div class="panel-body">
									{!! Form::open(['route' => 'change_password_post', 'method' => 'post', 'class' => 'form-validate-general', 'id' => 'passwordForm']) !!}
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Nombre de usuario</label>
													{!! Form::text('readUsername', $user->username, ['id' => 'readUsername', 'class' => 'form-control', 'readOnly' => true]) !!}
												</div>
												<div class="col-md-6">
													<label>Contraseña actual <span class="text-danger">*</span></label>
													{!! Form::password('password_actual', ['id' => 'password_actual', 'class' => 'form-control', 'placeholder' => 'Contraseña actual', 'required' => true]) !!}
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Nueva contraseña <span class="text-danger">*</span></label>
													{!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Nueva contraseña', 'required' => true]) !!}
												</div>
												<div class="col-md-6">
													<label>Repetir nueva contraseña <span class="text-danger">*</span></label>
													{!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Repita la nueva contraseña', 'required' => true] ) !!}
												</div>
											</div>
										</div>
				                        <div class="text-right">
				                        	{!! Form::button('Actualizar <i class="icon-arrow-right14 position-right"></i>', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
				                        </div>
			                        {!! Form::close() !!}
								</div>
							</div>
							<!-- /account settings -->
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!-- /user profile -->
@stop