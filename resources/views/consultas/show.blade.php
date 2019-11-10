@extends('layoutPdc')

@section('title', 'Ver consulta')

@section('content')

	<h3> {{ $consulta->nombre }} {{ $consulta->apellido }} </h3>

	<div>{{ $consulta->salida->titulo }}</div>
	<div>{{ $consulta->provincia ? $consulta->provincia->nombre.', ': ''  }} {{ $consulta->pais->nombre }}</div>
	
	<div>{{ $consulta->telefono }}</div>
	<div>{{ $consulta->email }}</div>
	<div>{{ $consulta->descripcion }}</div>
	<div>{{ $consulta->created_at }}</div>


@endsection