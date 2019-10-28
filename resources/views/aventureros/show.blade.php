@extends('layoutPdc')

@section('title', 'Ver aventurero')

@section('content')

	<h3> {{ $aventurero->nombre }} {{ $aventurero->apellido }}  </h3>
	<div>{{ $aventurero->identificacion }}</div>
	<div>{{ $aventurero->fecha_nacimiento }}</div>
	<div>{{ $aventurero->direccion }}</div>
	<div>{{ $aventurero->telefono }}</div>
	<div>{{ $aventurero->email }}</div>

	<p>
		<a href="/pdc/aventureros/{{ $aventurero->id }}/edit">Editar</a>
	</p>


@endsection