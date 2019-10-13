@extends('layoutPdc')

@section('title', 'Condiciones')

@section('content')

	<h1> {{ $condicion->titulo }} </h1>
	<p> {{ $condicion->descripcion }} </p>

	<p>
		<a href="/pdc/condiciones/{{ $condicion->id }}/edit">Editar</a>
	</p>


@endsection