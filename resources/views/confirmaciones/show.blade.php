@extends('layoutPdc')

@section('title', 'Ver reserva confirmada')

@section('content')

	<h3>Reserva confirmada</h3>
	<div>{{ $confirmacion->reserva->codigo }}</div>
	<div>{{ $confirmacion->reserva->nombre }} {{ $confirmacion->reserva->apellido }}</div>
	<div>{{ $confirmacion->reserva->idenficacion }}</div>
	<div>{{ $confirmacion->reserva->telefono }}</div>
	<div>{{ $confirmacion->reserva->email }}</div>
	<div>{{ $confirmacion->reserva->monto_total }}</div>
	<div>{{ $confirmacion->reserva->fecha->getFormattedInicio() }}</div>
	<div>{{ $confirmacion->reserva->cant_aventureros }}</div>



@endsection