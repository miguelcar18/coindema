<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>Orden <span class="text-danger">*</span></label>
			{!! Form::select('orden', ['' => 'Seleccione', 'coordinacion' => 'Coordinación', 'compras' => 'Compras', 'servicios' => 'Servicios', 'entrada' => 'Entrada', 'salida' => 'Salida'], null, ['id' => 'orden', 'class' => 'form-control', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Fecha <span class="text-danger">*</span></label>
			@if(isset($comunicacion->fecha))
                {{--*/ $separarFecha =  explode('-', $comunicacion->fecha) /*--}}
                {{--*/ $fechaNormal =  $separarFecha[2].'/'.$separarFecha[1].'/'.$separarFecha[0] /*--}}
                {!! Form::text('fecha', $fechaNormal, ['id' => 'fecha', 'class' => 'form-control pickadate-comunicacion', 'required' => true]) !!}
            @else
				{!! Form::text('fecha', null, ['id' => 'fecha', 'class' => 'form-control pickadate-comunicacion', 'required' => true]) !!}
			@endif
			<label id="fecha-error" class="validation-error-label" for="fecha"></label>
		</div>
		<div class="col-md-4">
			<label>Número de oficio <span class="text-danger">*</span></label>
			{!! Form::text('numero_oficio', null, ['id' => 'numero_oficio', 'class' => 'form-control', 'required' => true]) !!}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-md-4">
			<label>De <span class="text-danger">*</span></label>
			{!! Form::text('de', null, ['id' => 'de', 'class' => 'form-control', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Para <span class="text-danger">*</span></label>
			{!! Form::text('para', null, ['id' => 'para', 'class' => 'form-control', 'required' => true]) !!}
		</div>
		<div class="col-md-4">
			<label>Asunto <span class="text-danger">*</span></label>
			{!! Form::text('asunto', null, ['id' => 'asunto', 'class' => 'form-control', 'required' => true]) !!}
		</div>
	</div>
</div>