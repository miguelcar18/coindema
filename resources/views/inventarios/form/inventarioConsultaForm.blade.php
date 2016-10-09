<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label class="control-label">Producto</label>
			{!! Form::select('producto', ['' => 'Seleccione', 'equipos' => 'Equipo', 'herramientas' => 'Herramientas', 'maquinarias' => 'Maquinarias', 'materiales' => 'Materiales'], null, ['id' => 'producto', 'class' => 'form-control']) !!}
		</div>
		<div class="col-md-4">
			<label class="control-label">Modelo</label>
			{!! Form::text('modelo', null, ['id' => 'modelo', 'class' => 'form-control', 'placeholder' => 'Modelo']) !!}
		</div>
		<div class="col-md-4">
			<label class="control-label">Marca</label>
			{!! Form::text('marca', null, ['id' => 'marca', 'class' => 'form-control', 'placeholder' => 'Marca']) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label class="control-label">Cantidad</label>
			{!! Form::input('number', 'cantidad', null, ['id' => 'cantidad', 'class' => 'form-control', 'placeholder' => '0.00', 'step' => 'any', 'min' => '1']) !!}
		</div>
		<div class="col-md-4">
			<label class="control-label">Serial</label>
			{!! Form::text('serial', null, ['id' => 'serial', 'class' => 'form-control', 'placeholder' => 'Serial']) !!}
		</div>
		<div class="col-md-4">
			<label class="control-label">Departamento</label>
			{!! Form::select('departamento', $departamentos, null, ['id' => 'departamento', 'class' => 'form-control']) !!}
		</div>
	</div>
</div>