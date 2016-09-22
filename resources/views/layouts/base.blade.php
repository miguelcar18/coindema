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
					<div class="page-header">
						<div class="page-header-content">
							<div class="page-title">
								<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Forms</span> - Basic Inputs</h4>
							</div>
							<div class="heading-elements">
								<div class="heading-btn-group">
									<a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
									<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
									<a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
								</div>
							</div>
						</div>
						<div class="breadcrumb-line">
							<ul class="breadcrumb">
								<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
								<li><a href="form_inputs_basic.html">Forms</a></li>
								<li class="active">Basic inputs</li>
							</ul>
							<ul class="breadcrumb-elements">
								<li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-gear position-left"></i>
										Settings
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
										<li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
										<li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
										<li class="divider"></li>
										<li><a href="#"><i class="icon-gear"></i> All settings</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<!-- /page header -->
					@show
					<!-- Content area -->
					<div class="content">
						@section('contenido')
						<!-- Horizontal form options -->
						<div class="row">
							<div class="col-md-12">
								<!-- Basic layout-->
								<form action="#" class="form-horizontal">
									<div class="panel panel-flat">
										<div class="panel-heading">
											<h5 class="panel-title">Basic layout</h5>
											<div class="heading-elements">
												<ul class="icons-list">
							                		<li><a data-action="collapse"></a></li>
							                		<li><a data-action="reload"></a></li>
							                		<li><a data-action="close"></a></li>
							                	</ul>
						                	</div>
										</div>

										<div class="panel-body">
											<div class="form-group">
												<label class="col-lg-3 control-label">Name:</label>
												<div class="col-lg-9">
													<input type="text" class="form-control" placeholder="Eugene Kopyov">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Password:</label>
												<div class="col-lg-9">
													<input type="password" class="form-control" placeholder="Your strong password">
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Your state:</label>
												<div class="col-lg-9">
													<select class="select">
														<optgroup label="Alaskan/Hawaiian Time Zone">
															<option value="AK">Alaska</option>
															<option value="HI">Hawaii</option>
														</optgroup>
														<optgroup label="Pacific Time Zone">
															<option value="CA">California</option>
															<option value="NV">Nevada</option>
															<option value="WA">Washington</option>
														</optgroup>
														<optgroup label="Mountain Time Zone">
															<option value="AZ">Arizona</option>
															<option value="CO">Colorado</option>
															<option value="WY">Wyoming</option>
														</optgroup>
														<optgroup label="Central Time Zone">
															<option value="AL">Alabama</option>
															<option value="AR">Arkansas</option>
															<option value="KY">Kentucky</option>
														</optgroup>
														<optgroup label="Eastern Time Zone">
															<option value="CT">Connecticut</option>
															<option value="DE">Delaware</option>
															<option value="FL">Florida</option>
														</optgroup>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Gender:</label>
												<div class="col-lg-9">
													<label class="radio-inline">
														<input type="radio" class="styled" name="gender" checked="checked">
														Male
													</label>

													<label class="radio-inline">
														<input type="radio" class="styled" name="gender">
														Female
													</label>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Your avatar:</label>
												<div class="col-lg-9">
													<input type="file" class="file-styled">
													<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Tags:</label>
												<div class="col-lg-9">
													<select multiple="multiple" data-placeholder="Enter tags" class="select-icons">
														<optgroup label="Services">
															<option value="wordpress2" data-icon="wordpress2">Wordpress</option>
															<option value="tumblr2" data-icon="tumblr2">Tumblr</option>
															<option value="stumbleupon" data-icon="stumbleupon">Stumble upon</option>
															<option value="pinterest2" data-icon="pinterest2">Pinterest</option>
															<option value="lastfm2" data-icon="lastfm2">Lastfm</option>
														</optgroup>
														<optgroup label="File types">
															<option value="pdf" data-icon="file-pdf">PDF</option>
															<option value="word" data-icon="file-word">Word</option>
															<option value="excel" data-icon="file-excel">Excel</option>
															<option value="openoffice" data-icon="file-openoffice">Open office</option>
														</optgroup>
														<optgroup label="Browsers">
															<option value="chrome" data-icon="chrome" selected="selected">Chrome</option>
															<option value="firefox" data-icon="firefox" selected="selected">Firefox</option>
															<option value="safari" data-icon="safari">Safari</option>
															<option value="opera" data-icon="opera">Opera</option>
															<option value="IE" data-icon="IE">IE</option>
														</optgroup>
													</select>
												</div>
											</div>

											<div class="form-group">
												<label class="col-lg-3 control-label">Your message:</label>
												<div class="col-lg-9">
													<textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
												</div>
											</div>

											<div class="text-right">
												<button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
											</div>
										</div>
									</div>
								</form>
								<!-- /basic layout -->
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
		<script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/pages/form_layouts.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
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