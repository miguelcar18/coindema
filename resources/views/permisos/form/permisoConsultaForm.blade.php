<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Tipo de permiso</label>
			{!! Form::select('tipo_permiso', ['' => 'Seleccione', 'Remunerado' => 'Remunerado', 'No Remunerado' => 'No Remunerado'], null, ['id' => 'tipo_permiso', 'class' => 'form-control']) !!}
		</div>
		<div class="col-md-4">
			<label>Desde</label>
				{!! Form::text('desde', null, ['id' => 'desde', 'class' => 'form-control pickadate-comunicacion']) !!}
		</div>
		<div class="col-md-4">
			<label>Hasta</label>
				{!! Form::text('hasta', null, ['id' => 'hasta', 'class' => 'form-control pickadate-comunicacion']) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Suplencia</label>
			<div class="checkbox-switch">
				{!! Form::select('suplente', ['' => 'Seleccione', '1' => 'Si', '0' => 'No'], null, ['id' => 'suplente', 'class' => 'form-control']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<label>Estado</label>
			<div class="checkbox-switch">
				{!! Form::select('aprobacion', ['' => 'Seleccione', '1' => 'Aprobado', '0' => 'Rechazado'], null, ['id' => 'aprobacion', 'class' => 'form-control']) !!}
			</div>
		</div>
	</div>
</div>