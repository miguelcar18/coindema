<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Producto <span class="text-danger">*</span></label>
			{!! Form::select('producto', ['' => 'Seleccione', 'equipos' => 'Equipo', 'herramientas' => 'Herramientas', 'maquinarias' => 'Maquinarias', 'materiales' => 'Materiales'], null, ['id' => 'producto', 'class' => 'form-control', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Modelo <span class="text-danger">*</span></label>
			{!! Form::text('modelo', null, ['id' => 'modelo', 'class' => 'form-control', 'placeholder' => 'Modelo', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Marca <span class="text-danger">*</span></label>
			{!! Form::text('marca', null, ['id' => 'marca', 'class' => 'form-control', 'placeholder' => 'Marca', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Cantidad <span class="text-danger">*</span></label>
			{!! Form::input('number', 'cantidad', null, ['id' => 'cantidad', 'class' => 'form-control', 'placeholder' => '0.00', 'step' => 'any']) !!}
		</div>
		<div class="col-md-4">
			<label>Serial <span class="text-danger">*</span></label>
			{!! Form::text('serial', null, ['id' => 'serial', 'class' => 'form-control', 'placeholder' => 'Serial', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Departamento <span class="text-danger">*</span></label>
			{!! Form::select('departamento', $departamentos, null, ['id' => 'departamento', 'class' => 'form-control', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-12">
			<label>Observaciones</label>
			{!! Form::textarea('observaciones', null, ['id' => 'observaciones', 'class' => 'form-control', 'rows' => '5']) !!}
		</div>
	</div>
</div>