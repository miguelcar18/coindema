<!-- Main navbar -->
<div class="navbar navbar-default header-highlight">
	<div class="navbar-header">
		<a class="navbar-brand text-center" href="index.html" style="color:white">
			COINDEMA
		</a>
		<ul class="nav navbar-nav visible-xs-block">
			<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
		</ul>
	</div>
	<div class="navbar-collapse collapse" id="navbar-mobile">
		<ul class="nav navbar-nav">
			<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown dropdown-user">
				<a class="dropdown-toggle" data-toggle="dropdown">
					@if(Auth::user()->path == '')
                        <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="">
                    @else
                    	<img src="{{ asset('uploads/users/'.Auth::user()->path) }}"/>
                    @endif
					<span>{{ Auth::user()->name }}</span>
					<i class="caret"></i>
				</a>
				<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="{{ URL::route('users.show', Auth::user()->id) }}"><i class="icon-user-check"></i> Mi perfil</a></li>
					{{--
					<li><a href="{{ URL::route('users.edit', Auth::user()->id) }}"><i class="icon-pencil7"></i> Editar perfil</a></li>
					<li><a href="{{ URL::route('change_password') }}"><i class="icon-lock2"></i> Cambiar clave</a></li>
					--}}
					<li><a href="{{ URL::route('logout') }}"><i class="icon-switch2"></i> Cerrar sesión</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<!-- /main navbar -->