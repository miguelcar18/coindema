@if($alerta == 'success')
	<div class="alert bg-success alert-styled-left">
		<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Cerrar</span></button>
		<span class="text-bold">¡{{ $titulo }}!</span> {{ $subtitulo }}
	</div>
@elseif($alerta == 'error')
	<div class="alert bg-danger-400 alert-styled-left">
		<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
		<span class="text-bold">¡{{ $titulo }}! </span> {{ $subtitulo }}
	</div>
@endif