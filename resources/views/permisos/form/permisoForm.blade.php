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
			{!! Form::select('tipo_permiso', ['' => 'Seleccione', 'Remunerado' => 'Remunerado', 'No Remunerado' => 'No Remunerado'], null, ['id' => 'tipo_permiso', 'class' => 'form-control', 'required' => true]) !!}
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
			<label>Desde <span class="text-danger">*</span></label>
			@if(isset($permiso->desde))
                {{--*/ $separarDesde =  explode('-', $permiso->desde) /*--}}
                {{--*/ $fechaDesde =  $separarDesde[2].'/'.$separarDesde[1].'/'.$separarDesde[0] /*--}}
                {!! Form::text('desde', $fechaDesde, ['id' => 'desde', 'class' => 'form-control pickadate-comunicacion', 'required' => true]) !!}
            @else
				{!! Form::text('desde', null, ['id' => 'desde', 'class' => 'form-control pickadate-comunicacion', 'required' => true]) !!}
			@endif
		</div>
		<div class="col-md-4">
			<label>Hasta <span class="text-danger">*</span></label>
			@if(isset($permiso->hasta))
                {{--*/ $separarHasta =  explode('-', $permiso->hasta) /*--}}
                {{--*/ $fechaHasta =  $separarHasta[2].'/'.$separarHasta[1].'/'.$separarHasta[0] /*--}}
                {!! Form::text('hasta', $fechaHasta, ['id' => 'hasta', 'class' => 'form-control pickadate-comunicacion', 'required' => true]) !!}
            @else
				{!! Form::text('hasta', null, ['id' => 'hasta', 'class' => 'form-control pickadate-comunicacion', 'required' => true]) !!}
			@endif
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Suplencia</label>
			<div class="checkbox-switch">
				{!! Form::checkbox('suplente', null, null, ['id' => 'suplente', 'class' => 'switch', 'data-on-color' => 'success', 'data-off-color' => 'danger', 'data-on-text' => 'Si', 'data-off-text' => 'No']) !!}
			</div>
		</div>
		<div class="col-md-4">
			<label>Estado</label>
			<div class="checkbox-switch">
				{!! Form::checkbox('aprobacion', null, null, ['id' => 'aprobacion', 'class' => 'switch', 'data-on-color' => 'success', 'data-off-color' => 'danger', 'data-on-text' => 'Aprobado', 'data-off-text' => 'Rechazado']) !!}
			</div>
		</div>
	</div>
</div>