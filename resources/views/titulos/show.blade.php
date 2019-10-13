@extends('layoutPdc')

@section('title', 'Ver título')

@section('content')

	<h1> {{ $titulo->descripcion }} </h1>

	<p>
		<a href="/pdc/titulos/{{ $titulo->id }}/edit">Editar</a>
	</p>


@endsection