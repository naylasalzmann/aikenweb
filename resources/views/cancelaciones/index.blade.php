@extends('layoutPdc')

@section('title', 'Cancelaciones')

@section('content')

	
	<h1>Estas son tus cancelaciones</h1>

	<ul>
		@foreach ($cancelaciones as $cancelacion)
		 	<li>
		 		<a href="/pdc/cancelaciones/{{ $cancelacion->id }}">
		 			{{ $cancelacion->codigo }} {{ $cancelacion->nombre }}, {{ $cancelacion->apellido }}
		 		</a>
		 	</li>
		@endforeach	
	</ul>

@endsection