@extends('layoutPdc')

@section('title', 'Localidades')

@section('content')

	<h1> {{ $tipo->descripcion }} </h1>

	<p>
		<a href="/pdc/tiposSalida/{{ $tipo->id }}/edit">Editar</a>
	</p>


@endsection