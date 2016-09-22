<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Miguel Carmona">
		<title>Login - Sistema de Inventario COINDEMA</title>
		<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
		<!-- Global stylesheets -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">
		<!-- /global stylesheets -->
	</head>
	<body>
		<!-- Page container -->
		<div class="page-container login-container">
			<!-- Page content -->
			<div class="page-content">
				<!-- Main content -->
				<div class="content-wrapper">
					<!-- Content area -->
					<div class="content">
						<!-- Simple login form -->
						{!! Form::open(['route' => 'login.store', 'method' => 'post', 'id' => 'loginForm', 'name' => 'loginForm', 'class' => 'form-validate']) !!}
							<div class="panel panel-body login-form">
								<div class="text-center">
									<img src="{{ asset('assets/images/logo_udo.svg') }}" width="150px" height="auto">
									<h5 class="content-group">COINDEMA - Inicio de sesión<small class="display-block">Ingrese sus datos de usuario</small></h5>
								</div>
								<div id="respuesta"></div>
								<div class="form-group has-feedback has-feedback-left">
									{!! Form::text('username', null, ['placeholder' => 'Nombre de usuario', 'class' => 'form-control', 'required' => true]) !!}
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>
								<div class="form-group has-feedback has-feedback-left">
									{!! Form::password('password', ['placeholder' => 'Contraseña', 'class' => 'form-control', 'required' => true]) !!}
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>
								<div class="form-group">
									{!! Form::button('Iniciar <i class="icon-circle-right2 position-right"></i>', ['class'=> 'btn btn-primary btn-block', 'id' => 'loginButton', 'type' => 'submit']) !!}
								</div>
								<div class="text-center">
									<a href="password/email">¿Olvidó su contraseña?</a>
								</div>
							</div>
						{!! Form::close()!!}
						<!-- /simple login form -->
						<!-- Footer -->
						<div class="footer text-muted">
							Sistema para el control de inventario del Departamento de Mantenimiento (COINDEMA) 2016 - Udo Monagas
						</div>
						<!-- /footer -->
					</div>
					<!-- /content area -->
				</div>
				<!-- /main content -->
			</div>
			<!-- /page content -->
		</div>
		<!-- /page container -->
	</body>
	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/validation/validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/pages/login_validation.js') }}"></script>
	<!-- /theme JS files -->
</html>