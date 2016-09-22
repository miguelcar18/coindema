<div class="form-group">
	<div class="row">
		<div class="col-md-3">
			<label>Unidad <span class="text-danger">*</span></label>
			{!! Form::text('unidad', null, ['id' => 'unidad', 'class' => 'form-control', 'placeholder' => 'Unidad', 'required' => true]) !!}
		</div>
		<div class="col-md-3">
			<label>Marca <span class="text-danger">*</span></label>
			{!! Form::text('marca', null, ['id' => 'marca', 'class' => 'form-control', 'placeholder' => 'Marca', 'required' => true]) !!}
		</div>
		<div class="col-md-3">
			<label>Modelo <span class="text-danger">*</span></label>
			{!! Form::text('modelo', null, ['id' => 'modelo', 'class' => 'form-control', 'placeholder' => 'Modelo', 'required' => true]) !!}
		</div>
		<div class="col-md-3">
			<label>Placa <span class="text-danger">*</span></label>
			{!! Form::text('placa', null, ['id' => 'placa', 'class' => 'form-control', 'placeholder' => 'Placa', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-3">
			<label>Serial <span class="text-danger">*</span></label>
			{!! Form::text('serial', null, ['id' => 'serial', 'class' => 'form-control', 'placeholder' => 'Serial', 'required' => true]) !!}
		</div>
		<div class="col-md-3">
			<label>Carrocería <span class="text-danger">*</span></label>
			{!! Form::text('carroceria', null, ['id' => 'carroceria', 'class' => 'form-control', 'placeholder' => 'Carroceria', 'required' => true]) !!}
		</div>
		<div class="col-md-3">
			<label>Serial del motor <span class="text-danger">*</span></label>
			{!! Form::text('serial_motor', null, ['id' => 'serial_motor', 'class' => 'form-control', 'placeholder' => 'Serial del motor', 'required' => true]) !!}
		</div>
		<div class="col-md-3">
			<label>Color <span class="text-danger">*</span></label>
			{!! Form::text('color', null, ['id' => 'color', 'class' => 'form-control', 'placeholder' => 'Color', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			<label>Departamento <span class="text-danger">*</span></label>
			{!! Form::select('departamento', $departamentos, null, ['id' => 'departamento', 'class' => 'form-control', 'required' => true]) !!}
		</div>
		<div class="col-md-6">
			<label>Estado <span class="text-danger">*</span></label>
			{!! Form::textarea('estado', null, ['id' => 'estado', 'class' => 'form-control', 'rows' => '5']) !!}
		</div>
	</div>
</div>