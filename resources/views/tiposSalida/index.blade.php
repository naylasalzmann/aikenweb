@extends('layoutPdc')

@section('title', 'Tipos de salida')

@section('content')

	
	<h1>Estos son tus tipos de salida</h1>

	<ul>
		@foreach ($tipos as $tipo)
		 	<li>
		 		<a href="/pdc/tiposSalida/{{ $tipo->id }}">{{ $tipo->descripcion }}</a>
		 	</li>
		@endforeach	
	</ul>

@endsection

