@extends('layoutPdc')

@section('title', 'Localidades')

@section('content')

	<h1>Localidades</h1>

	<ul>
		@foreach ($localidades as $localidad)
		 	<li>
		 		<a href="/pdc/localidades/{{ $localidad->id }}">
		 			{{ $localidad->nombre }}, {{ $localidad->provincia->nombre }}
		 		</a>
		 	</li>
		@endforeach	
	</ul>

@endsection
