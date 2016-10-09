<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			@section('titulo') Inicio @show - Sistema de inventario COINDEMA
		</title>
		<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" >
		<!-- Global stylesheets -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/estilos.css') }}" rel="stylesheet" type="text/css">
		<!-- /global stylesheets -->
		@yield('estilos')
	</head>
	<body>
		<div id="respuesta" class="alertas">
			@if(Session::has('message-alert'))
                @include('layouts.messages-alert', ['titulo' => Session::get('titulo'), 'subtitulo' => Session::get('message-alert'), 'alerta' => Session::get('alerta')])
            @endif
            @if(count($errors) > 0)
            	{{--*/ $subtitulo = "<ul>" /*--}}
		        @foreach($errors->all() as $error)
		        	{{--*/ $subtitulo .= "<li>$error</li>" /*--}}
		        @endforeach
		        {{--*/ $subtitulo .= "</ul>" /*--}}
		        @include('layouts.messages-alert', ['titulo' => 'Error: ', 'subtitulo' => $subtitulo, 'alerta' => 'error'])
		    @endif
		</div>
		@include('layouts.navbar')
		<!-- Page container -->
		<div class="page-container">
			<!-- Page content -->
			<div class="page-content">
				@include('layouts.sidebar')
				<!-- Main content -->
				<div class="content-wrapper">
					@section('cabecera-contenido')
					<!-- Page header -->
					<!-- /page header -->
					@show
					<!-- Content area -->
					<div class="content">
						@section('contenido')
						<!-- Horizontal form options -->
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title text-center"><b>Sistema para el control de inventario del Departamento de Mantenimiento (COINDEMA)</b></h5>
									</div>
									<div class="panel-body">
										El Sistema para el control de inventario del Departamento de Mantenimiento perteneciente a la Universidad de Oriente Núcleo Monagas (COINDEMA) es desarrollado con la finalidad de llevar un control adecuado del inventario de maquinarias, materiales, equipos, herramientas y vehículos. También permite el registro y manejo de las comunicaciones realizadas y los permisos tramitados.
									</div>
									@if(isset($cantidadUsuario) and isset($cantidadDepartamento) and isset($cantidadPermiso) and isset($cantidadComunicacion) and isset($cantidadVehiculo) and isset($cantidadEquipo) and isset($cantidadHerramienta) and isset($cantidadMaquinaria) and isset($cantidadMaterial))
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-4">
												<ul class="list-inline">
													<li>
														<a class="btn border-brown-800 text-brown-800 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
													</li>
													<li class="text-left">
														<div class="text-semibold">Total Usuarios</div>
														<div class="text-muted">{{ $cantidadUsuario }}</div>
													</li>
												</ul>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4">
												<ul class="list-inline">
													<li>
														<a class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-office"></i></a>
													</li>
													<li class="text-left">
														<div class="text-semibold">Total Departamentos</div>
														<div class="text-muted">{{ $cantidadDepartamento }}</div>
													</li>
												</ul>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4">
												<ul class="list-inline">
													<li>
														<a class="btn border-purple-800 text-purple-800 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-bookmark4"></i></a>
													</li>
													<li class="text-left">
														<div class="text-semibold">Total Permisos</div>
														<div class="text-muted">{{ $cantidadPermiso }}</div>
													</li>
												</ul>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-4">
												<ul class="list-inline">
													<li>
														<a class="btn border-slate-400 text-slate-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-archive"></i></a>
													</li>
													<li class="text-left">
														<div class="text-semibold">Total Comunicaciones</div>
														<div class="text-muted">{{ $cantidadComunicacion }}</div>
													</li>
												</ul>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4">
												<ul class="list-inline">
													<li>
														<a class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-car"></i></a>
													</li>
													<li class="text-left">
														<div class="text-semibold">Total Vehículos</div>
														<div class="text-muted">{{ $cantidadVehiculo }}</div>
													</li>
												</ul>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4">
												<ul class="list-inline">
													<li>
														<a class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-box"></i></a>
													</li>
													<li class="text-left">
														<div class="text-semibold">Total Equipos</div>
														<div class="text-muted">{{ $cantidadEquipo }}</div>
													</li>
												</ul>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-4 col-md-4 col-sm-4">
												<ul class="list-inline">
													<li>
														<a class="btn border-green-800 text-green-800 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-wrench"></i></a>
													</li>
													<li class="text-left">
														<div class="text-semibold">Total Herramientas</div>
														<div class="text-muted">{{ $cantidadHerramienta }}</div>
													</li>
												</ul>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4">
												<ul class="list-inline">
													<li>
														<a class="btn border-grey-800 text-grey-800 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-truck"></i></a>
													</li>
													<li class="text-left">
														<div class="text-semibold">Total Maquinarias</div>
														<div class="text-muted">{{ $cantidadMaquinaria }}</div>
													</li>
												</ul>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4">
												<ul class="list-inline">
													<li>
														<a class="btn border-danger-800 text-danger-800 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-package"></i></a>
													</li>
													<li class="text-left">
														<div class="text-semibold">Total Materiales</div>
														<div class="text-muted">{{ $cantidadMaterial }}</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
									@endif
								</div>
							</div>
						</div>
						<!-- /vertical form options -->
						@show
						@include('layouts.footer')
					</div>
					<!-- /content area -->
				</div>
				<!-- /main content -->
			</div>
			<!-- /page content -->
		</div>
		<!-- /page container -->
		<!-- Core JS files -->
		<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
		<script type="text/javascript">
            function decision(message, url){
                if(confirm(message)) location.href = url;
            }
            function confirmSubmit(form, message) { 
                var agree=confirm(message); 
                if (agree) {
                    form.submit();
                    return false; //de todas formas el link no se ejecutara
                } else {
                    return false;
                } 
            }
            $.fn.reset = function () {
                $(this).each (function() { this.reset(); });
            }
        </script>
		<!-- /core JS files -->

		<!-- Theme JS files -->
		<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/validation/validate.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/select2.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/pages/form_layouts.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switch.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/ui/moment/moment.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/daterangepicker.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/validate_forms.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/pickadate/picker.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/pickers/pickadate/picker.date.js') }}"></script>


		{{--
		<script type="text/javascript" src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
		--}}
		<!-- /theme JS files -->
		@yield('javascripts')
	</body>
</html>