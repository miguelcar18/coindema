<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			<label>Nombre <span class="text-danger">*</span></label>
			{!! Form::text('nombre', null, ['id' => 'nombre', 'class' => 'form-control', 'required' => true]) !!}
		</div>
		<div class="col-md-6">
			<label>Notas</label>
			{!! Form::textarea('notas', null, ['id' => 'notas', 'class' => 'form-control', 'rows' => '5']) !!}
		</div>
	</div>
</div>