<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Cédula <span class="text-danger">*</span></label>
			{!! Form::text('cedula', null, ['id' => 'cedula', 'class' => 'form-control', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Nombre y apellido <span class="text-danger">*</span></label>
			{!! Form::text('nombre', null, ['id' => 'nombre', 'class' => 'form-control', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Cargo <span class="text-danger">*</span></label>
			{!! Form::text('cargo', null, ['id' => 'cargo', 'class' => 'form-control', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Tipo de personal <span class="text-danger">*</span></label>
			{!! Form::text('tipo_personal', null, ['id' => 'tipo_personal', 'class' => 'form-control', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Adscrito <span class="text-danger">*</span></label>
			{!! Form::text('adscrito', null, ['id' => 'adscrito', 'class' => 'form-control', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Tipo de permiso <span class="text-danger">*</span></label>
			{!! Form::text('tipo_permiso', null, ['id' => 'tipo_permiso', 'class' => 'form-control', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Duración <span class="text-danger">*</span></label>
			{!! Form::text('duracion', null, ['id' => 'duracion', 'class' => 'form-control', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Fecha requerida <span class="text-danger">*</span></label>
			{!! Form::text('fecha_requerida', null, ['id' => 'fecha_requerida', 'class' => 'form-control pickadate-comunicacion', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Suplencia</label>
			<div class="checkbox-switch">
				{!! Form::checkbox('suplente', null, null, ['id' => 'suplente', 'class' => 'switch', 'data-on-color' => 'success', 'data-off-color' => 'danger', 'data-on-text' => 'Si', 'data-off-text' => 'No']) !!}
			</div>
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Estado</label>
			<div class="checkbox-switch">
				{!! Form::checkbox('aprobacion', null, null, ['id' => 'aprobacion', 'class' => 'switch', 'data-on-color' => 'success', 'data-off-color' => 'danger', 'data-on-text' => 'Aprobado', 'data-off-text' => 'Rechazado']) !!}
			</div>
		</div>
	</div>
</div>