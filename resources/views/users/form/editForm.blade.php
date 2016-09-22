<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Imagen de perfil</label>
            {!! Form::file('file', ['id' => 'file', 'class' => 'file-styled', 'accept' => 'image/jpg,image/png,image/jpeg,image/gif']) !!}
            <span class="help-block">Formatos aceptados: gif, png, jpg. Tamaño máximo del archivo 2 Mb</span>
		</div>
		<div class="col-md-4">
			<label>Nombre de usuario <span class="text-danger">*</span></label>
			{!! Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'Nombre de usuario', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Rol de usuario <span class="text-danger">*</span></label>
			{!! Form::select('rol', ['' => 'Seleccione', '1' => 'Administrador', '0' => 'Usuario'], null, ['id' => 'rol', 'class' => 'form-control', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			<label>Nombre y apellido <span class="text-danger">*</span></label>
			{!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Nombre y apellido', 'required' => true]) !!}
		</div>
		<div class="col-md-6">
			<label>Email <span class="text-danger">*</span></label>
			{!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			<label>Detalles</label>
			{!! Form::textarea('details', null, ['id' => 'details', 'class' => 'form-control', 'rows' => '5']) !!}
		</div>
	</div>
</div>