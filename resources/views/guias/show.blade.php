@extends('layoutPdc')

@section('title', 'Ver guía')

@section('content')

	<h1>{{ $guia->nombre }} {{ $guia->apellido }}</h1>
	<div>{{ $guia->titulo_id }} por ahora</div>
	<div>{{ $guia->localidad_id }}</div>
	<div>{{ $guia->identificacion }}</div>
	<div>{{ $guia->fechaNacimiento }}</div>
	<div>{{ $guia->direccion }}</div>
	<div>{{ $guia->telefono }}</div>
	<div>{{ $guia->email }}</div>

	<p>
		<a href="/pdc/guias/{{ $guia->id }}/edit">Editar</a>
	</p>


@endsection