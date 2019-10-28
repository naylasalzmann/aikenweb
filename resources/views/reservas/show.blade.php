@extends('layoutPdc')

@section('title', 'Ver reserva')

@section('content')

	<h1>{{ $reserva->nombre }} {{ $reserva->apellido }}</h1>
	<div>{{ $reserva->fecha->getFormattedInicio() }}</div>
	<div>{{ $reserva->identificacion }}</div>
	<div>{{ $reserva->fecha_nacimiento }}</div>
	<div>{{ $reserva->direccion }}</div>
	<div>{{ $reserva->telefono }}</div>
	<div>{{ $reserva->email }}</div>
	<div>{{ $reserva->monto_total }}</div>
	<div>{{ $reserva->cant_aventureros }}</div>
	<div>{{ $reserva->metodo->descripcion }}</div>
	<div>{{ $reserva->fecha->salida->titulo }}</div>

	<p>
		<a href="/pdc/reservas/{{ $reserva->id }}/edit">Editar</a>
	</p>


@endsection