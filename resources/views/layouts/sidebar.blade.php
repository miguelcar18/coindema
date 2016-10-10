<!-- Main sidebar -->
<div class="sidebar sidebar-main">
	<div class="sidebar-content">
		<!-- User menu -->
		<div class="sidebar-user">
			<div class="category-content">
				<div class="media">
					<a href="#" class="media-left">
						@if(Auth::user()->path == '')
	                        <img src="{{ asset('assets/images/placeholder.jpg') }}" alt="">
	                    @else
	                    	<img src="{{ asset('uploads/users/'.Auth::user()->path) }}"/>
	                    @endif
					</a>
					<div class="media-body">
						<span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
						<div class="text-size-mini text-muted">
							<i class="icon-medal text-size-small"></i>
							@if(Auth::user()->rol == 1)
                                Administrador
                            @elseif(Auth::user()->rol == 0)
                                Usuario
                            @endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /user menu -->
		<!-- Main navigation -->
		<div class="sidebar-category sidebar-category-visible">
			<div class="category-content no-padding">
				<ul class="navigation navigation-main navigation-accordion">
					<li class="navigation-header"><span>Menú Principal</span> <i class="icon-menu" title="Main pages"></i></li>
					<li @if(Route::getCurrentRoute()->getName() == 'dashboard') class="active" @endif>
						<a href="{{ URL::route('dashboard') }}"><i class="icon-home4"></i> <span>Inicio</span></a>
					</li>
					<li>
						<a href="#"><i class="icon-office"></i> <span>Departamentos</span></a>
						<ul>
							<li @if(Route::getCurrentRoute()->getName() == 'departamentos.index' or Route::getCurrentRoute()->getName() == 'departamentos.show' or Route::getCurrentRoute()->getName() == 'departamentos.edit') class="active" @endif>
								<a href="{{ URL::route('departamentos.index') }}">Listado de departamentos</a>
							</li>
							<li @if(Route::getCurrentRoute()->getName() == 'departamentos.create') class="active" @endif>
								<a href="{{ URL::route('departamentos.create') }}">Agregar departamento</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-package"></i> <span>Inventario</span></a>
						<ul>
							<li @if(Route::getCurrentRoute()->getName() == 'inventarios.index' or Route::getCurrentRoute()->getName() == 'inventarios.show' or Route::getCurrentRoute()->getName() == 'inventarios.edit') class="active" @endif>
								<a href="{{ URL::route('inventarios.index') }}">Listado</a>
							</li>
							<li @if(Route::getCurrentRoute()->getName() == 'inventarios.create') class="active" @endif>
								<a href="{{ URL::route('inventarios.create') }}">Agregar registro</a>
							</li>
							<li @if(Route::getCurrentRoute()->getName() == 'inventarios.consulta' or Route::getCurrentRoute()->getName() == 'inventarios.resultados') class="active" @endif>
								<a href="{{ URL::route('inventarios.consulta') }}">Consulta</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-car"></i> <span>Vehiculos</span></a>
						<ul>
							<li @if(Route::getCurrentRoute()->getName() == 'vehiculos.index' or Route::getCurrentRoute()->getName() == 'vehiculos.show' or Route::getCurrentRoute()->getName() == 'vehiculos.edit') class="active" @endif>
								<a href="{{ URL::route('vehiculos.index') }}">Listado de vehiculos</a>
							</li>
							<li @if(Route::getCurrentRoute()->getName() == 'vehiculos.create') class="active" @endif>
								<a href="{{ URL::route('vehiculos.create') }}">Agregar vehiculo</a>
							</li>
							<li @if(Route::getCurrentRoute()->getName() == 'vehiculos.consulta' or Route::getCurrentRoute()->getName() == 'vehiculos.resultados') class="active" @endif>
								<a href="{{ URL::route('vehiculos.consulta') }}">Consulta</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-archive"></i> <span>Comunicaciones</span></a>
						<ul>
							<li @if(Route::getCurrentRoute()->getName() == 'comunicaciones.index' or Route::getCurrentRoute()->getName() == 'comunicaciones.show' or Route::getCurrentRoute()->getName() == 'comunicaciones.edit') class="active" @endif>
								<a href="{{ URL::route('comunicaciones.index') }}">Listado de comunicaciones</a>
							</li>
							<li @if(Route::getCurrentRoute()->getName() == 'comunicaciones.create') class="active" @endif>
								<a href="{{ URL::route('comunicaciones.create') }}">Agregar comunicación</a>
							</li>
							<li @if(Route::getCurrentRoute()->getName() == 'comunicaciones.consulta' or Route::getCurrentRoute()->getName() == 'comunicaciones.resultados') class="active" @endif>
								<a href="{{ URL::route('comunicaciones.consulta') }}">Consulta</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="icon-bookmark4"></i> <span>Permisos</span></a>
						<ul>
							<li @if(Route::getCurrentRoute()->getName() == 'permisos.index' or Route::getCurrentRoute()->getName() == 'permisos.show' or Route::getCurrentRoute()->getName() == 'permisos.edit') class="active" @endif>
								<a href="{{ URL::route('permisos.index') }}">Listado de permisos</a>
							</li>
							<li @if(Route::getCurrentRoute()->getName() == 'permisos.create') class="active" @endif>
								<a href="{{ URL::route('permisos.create') }}">Agregar permiso</a>
							</li>
							<li @if(Route::getCurrentRoute()->getName() == 'permisos.consulta' or Route::getCurrentRoute()->getName() == 'permisos.resultados') class="active" @endif>
								<a href="{{ URL::route('permisos.consulta') }}">Consulta</a>
							</li>
						</ul>
					</li>
					@if(Auth::user()->rol == 1)
					<li>
						<a href="#"><i class="icon-users4"></i> <span>Usuarios</span></a>
						<ul>
							<li @if(Route::getCurrentRoute()->getName() == 'users.index' or Route::getCurrentRoute()->getName() == 'users.show' or Route::getCurrentRoute()->getName() == 'users.edit') class="active" @endif>
								<a href="{{ URL::route('users.index') }}">Listado de usuarios</a>
							</li>
							<li @if(Route::getCurrentRoute()->getName() == 'users.create') class="active" @endif>
								<a href="{{ URL::route('users.create') }}">Agregar usuario</a>
							</li>
						</ul>
					</li>
					@endif
				</ul>
			</div>
		</div>
		<!-- /main navigation -->

	</div>
</div>
<!-- /main sidebar -->