<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Orden</label>
			{!! Form::select('orden', ['' => 'Seleccione', 'coordinacion' => 'Coordinación', 'compras' => 'Compras', 'servicios' => 'Servicios', 'entrada' => 'Entrada', 'salida' => 'Salida'], null, ['id' => 'orden', 'class' => 'form-control']) !!}
		</div>
		<div class="col-md-4">
			<label>Fecha</label>
				{!! Form::text('fecha', null, ['id' => 'fecha', 'class' => 'form-control pickadate-comunicacion']) !!}
		</div>
		<div class="col-md-4">
			<label>Número de oficio</label>
			{!! Form::text('numero_oficio', null, ['id' => 'numero_oficio', 'class' => 'form-control']) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>De</label>
			{!! Form::text('de', null, ['id' => 'de', 'class' => 'form-control']) !!}
		</div>
		<div class="col-md-4">
			<label>Para</label>
			{!! Form::text('para', null, ['id' => 'para', 'class' => 'form-control']) !!}
		</div>
		<div class="col-md-4">
			<label>Asunto</label>
			{!! Form::text('asunto', null, ['id' => 'asunto', 'class' => 'form-control']) !!}
		</div>
	</div>
</div>