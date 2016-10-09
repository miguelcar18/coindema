<div class="form-group">
	<div class="row">
		<div class="col-md-3">
			<label>Unidad</label>
			{!! Form::text('unidad', null, ['id' => 'unidad', 'class' => 'form-control', 'placeholder' => 'Unidad']) !!}
		</div>
		<div class="col-md-3">
			<label>Marca</label>
			{!! Form::text('marca', null, ['id' => 'marca', 'class' => 'form-control', 'placeholder' => 'Marca']) !!}
		</div>
		<div class="col-md-3">
			<label>Modelo</label>
			{!! Form::text('modelo', null, ['id' => 'modelo', 'class' => 'form-control', 'placeholder' => 'Modelo']) !!}
		</div>
		<div class="col-md-3">
			<label>Placa</label>
			{!! Form::text('placa', null, ['id' => 'placa', 'class' => 'form-control', 'placeholder' => 'Placa']) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-3">
			<label>Serial</label>
			{!! Form::text('serial', null, ['id' => 'serial', 'class' => 'form-control', 'placeholder' => 'Serial']) !!}
		</div>
		<div class="col-md-3">
			<label>Carrocería</label>
			{!! Form::text('carroceria', null, ['id' => 'carroceria', 'class' => 'form-control', 'placeholder' => 'Carroceria']) !!}
		</div>
		<div class="col-md-3">
			<label>Serial del motor</label>
			{!! Form::text('serial_motor', null, ['id' => 'serial_motor', 'class' => 'form-control', 'placeholder' => 'Serial del motor']) !!}
		</div>
		<div class="col-md-3">
			<label>Color</label>
			{!! Form::text('color', null, ['id' => 'color', 'class' => 'form-control', 'placeholder' => 'Color']) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			<label>Departamento</label>
			{!! Form::select('departamento', $departamentos, null, ['id' => 'departamento', 'class' => 'form-control']) !!}
		</div>
		<div class="col-md-6">
			<label>Estado</label>
			{!! Form::textarea('estado', null, ['id' => 'estado', 'class' => 'form-control', 'rows' => '5']) !!}
		</div>
	</div>
</div>