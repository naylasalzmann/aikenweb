@extends('layoutPdc')

@section('title', 'Zonas')

@section('content')

	
	<h1>Zonas</h1>

	<ul>
		@foreach ($zonas as $zona)
		 	<li>
		 		<a href="/pdc/zonas/{{ $zona->id }}">{{ $zona->nombre }}, {{ $zona->localidad->nombre }}</a>
		 	</li>
		@endforeach	
	</ul>

@endsection