@extends('layoutPdc')

@section('title', 'Ver reserva cancelada')

@section('content')

	<h3>Reserva cancelada</h3>
	<div>{{ $cancelacion->codigo }}</div>
	<div>{{ $cancelacion->nombre }} {{ $cancelacion->apellido }}</div>
	<div>{{ $cancelacion->idenficacion }}</div>
	<div>{{ $cancelacion->telefono }}</div>
	<div>{{ $cancelacion->email }}</div>
	<div>{{ $cancelacion->monto_total }}</div>
	<div>{{ $cancelacion->descripcion }}</div>


@endsection