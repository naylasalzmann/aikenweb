@extends('layoutPdc')

@section('title', 'Guías')

@section('content')
  		
	<h1>Estos son tus guías</h1>

	<ul>
		@foreach ($guias as $guia)
		 	<li>
		 		<a href="/pdc/guias/{{ $guia->id }}">{{ $guia->nombre }} {{ $guia->apellido }}</a>
		 	</li>
		@endforeach	
	</ul>


@endsection