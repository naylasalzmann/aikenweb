@extends('layoutPdc')

@section('title', 'Ver zona')

@section('content')

	<h1> {{ $zona->nombre }} </h1>

	<p>
		<a href="/pdc/zonas/{{ $zona->id }}/edit">Editar</a>
	</p>


@endsection