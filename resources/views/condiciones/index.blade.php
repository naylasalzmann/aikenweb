@extends('layoutPdc')

@section('title', 'Condiciones')

@section('content')
  		
	<h1>Estas son tus condiciones</h1>

	<ul>
		@foreach ($condiciones as $condicion)
		 	<li>
		 		<a href="/pdc/condiciones/{{ $condicion->id }}">{{ $condicion->titulo }}</a>
		 	</li>
		@endforeach	
	</ul>


@endsection