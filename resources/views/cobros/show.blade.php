@extends('layoutPdc')

@section('title', 'Ver cobro')

@section('content')

	<h3>Detalles del cobro Nro {{ $cobro->id }}</h3>

	<h6>{{ $cobro->nombre }} {{ $cobro->apellido }}</h6>
	<div>Código de reserva: <b>{{ $cobro->codigo_reserva }}</b></div>
	<div class="icon-reserva-data-container">
		<span><i class="material-icons sm">person</i></span> 
		<span class="reserva-data">
			ID: {{ $cobro->identificacion }}
		</span>
	</div>
	<div class="icon-reserva-data-container">
		<span><i class="material-icons sm">monetization_on</i></span> 
		<span class="reserva-data">
			Importe: ${{ $cobro->importe }}
		</span>
	</div>
	<div class="icon-reserva-data-container">
		<span><i class="material-icons sm">event</i></span> 
		<span class="reserva-data">
			{{ $cobro->fecha() }}
		</span>
	</div>
	<div class="icon-reserva-data-container">
		<span><i class="material-icons sm">note</i></span> 
		<span class="reserva-data">Concepto: {{ $cobro->concepto }}</span>
	</div>
	@if (!$cobro->anulado) 
	<div class="icon-reserva-data-container">
		<span><i class="material-icons sm">check</i></span> 
		<span class="reserva-data">Activo</span>
	</div>
	@else
		<div class="icon-reserva-data-container">
		<span><i class="material-icons sm">close</i></span> 
		<span class="reserva-data">Anulado</span>
	</div>
	@endif

@endsection