@extends('layoutPdc')

@section('title', 'Títulos')

@section('content')

	
	<h1>Estos son tus títulos</h1>

	<ul>
		@foreach ($titulos as $titulo)
		 	<li>
		 		<a href="/pdc/titulos/{{ $titulo->id }}">{{ $titulo->descripcion }}</a>
		 	</li>
		@endforeach	
	</ul>

@endsection
