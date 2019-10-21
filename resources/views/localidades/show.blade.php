@extends('layoutPdc')

@section('title', 'Ver localidad')

@section('content')

	<h1> {{ $localidad->nombre }} </h1>

	<p>
		<a href="/pdc/localidades/{{ $localidad->id }}/edit">Editar</a>
	</p>


@endsection