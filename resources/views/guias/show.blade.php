@extends('layoutPdc')

@section('title', 'Ver guía')

@section('content')

	<h1>{{ $guia->nombre }} {{ $guia->apellido }}</h1>
	<div>{{ $guia->titulo ? $guia->titulo->descripcion : "No presenta"}}</div>
	<div>{{ $guia->localidad->nombre }}</div>
	<div>{{ $guia->identificacion }}</div>
	<div>{{ $guia->fechaNacimiento }}</div>
	<div>{{ $guia->direccion }}</div>
	<div>{{ $guia->telefono }}</div>
	<div>{{ $guia->email }}</div>

	<p>
		<a href="/pdc/guias/{{ $guia->id }}/edit">Editar</a>
	</p>


@endsection