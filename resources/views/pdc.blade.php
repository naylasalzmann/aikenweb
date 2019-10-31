@extends('layoutPdc')

@section('title', 'Dashboard')

@section('content')

<h1>Dashboard</h1>


<h6>Fechas de salidas pendientes</h6>

@foreach ($fechasPendientes as $fecha)
	<div>{{ $fecha->getFormattedInicio() }}  {{ $fecha->salida->titulo }}</div>
@endforeach



<h6>Nuestros guías</h6>

@foreach ($guias as $guia)
	<div>{{ $guia->nombre }}  {{ $guia->apellido }}</div>
@endforeach


<h6>Aventureros de Aiken</h6>
@foreach ($aventureros as $aventurero)
	<div>{{ $aventurero->nombre }}  {{ $aventurero->apellido }}</div>
@endforeach


<h6>Quienes van a venir próximamente</h6>


@foreach($fechasPendientes as $fecha)
	<div>{{$fecha->salida->titulo}}, {{ $fecha->getFormattedInicio() }}</div>

 	@foreach($fecha->confirmaciones as $confirmacion)
 		<div>{{ $confirmacion->reserva->nombre }}</div>
	@endforeach
@endforeach


<h6>Salidas guiadas por cada guía (salidas asignadas a cada guía)</h6>

 @foreach ($guias as $guia)

 	<div>{{ $guia->nombre }} {{ $guia->apellido }}</div>

 	@foreach ($guia->salidas as $salida)
 		<div>{{ $salida->titulo }}</div>
 	@endforeach
 @endforeach

<h6>Salidas que guió cada guía (fechas de salidas concretadas que guió cada guía)</h6>
@foreach ($fechasPasadasConcretadas as $fecha)
	<div><b>{{ $fecha->getFormattedInicio() }}</b></div>
	<div>Salida: {{ $fecha->salida->titulo }}</div>

	@foreach ($fecha->salida->guias as $guia)
	<div>{{ $guia->nombre }} {{ $guia->apellido }}</div>
	@endforeach
@endforeach


<h4>Informe de ocupación de salidas</h4>

<h6>Salidas que no llegaron al cupo mínimo (antes del inicio)</h6>

@foreach ($fechasPasadas as $fecha)
	
	@if ( $fecha->cupo < $fecha->salida->cupo_minimo)
	<div>{{ $fecha->salida->titulo }} ({{ $fecha->getFormattedInicio() }})</div>
	<div>Cupo reservado: {{ $fecha->cupo }}</div>
	<div>Cupo mínimo de la salida: {{ $salida->cupo_minimo }}</div>
	@endif
@endforeach

<h6>Salidas agotadas</h6>

@foreach ($fechasPasadas as $fecha)
	@if ( $fecha->cupo >= $fecha->salida->cupo_maximo)
	<div>{{ $fecha->salida->titulo }} ({{ $fecha->getFormattedInicio() }})</div>
	<div>Cupo reservado: {{ $fecha->cupo }}</div>
	<div>Cupo máximo de la salida: {{ $salida->cupo_maximo }}</div>
	@endif
@endforeach


<h6>Porcentaje de cupos reservados</h6>

@foreach ($fechasOrdenadasPorOcupacion as $fecha)

	
	<div>{{ $fecha->salida->titulo }} ({{ $fecha->getFormattedInicio() }})</div>
	<div>Porcentaje: {{ round($fecha->cupo / $salida->cupo_maximo * 100 , 1) }}%</div>

@endforeach


<h6>Tipos de salida ordenados por nivel de ocupación</h6>

@foreach ($tiposDeSalidaOrdenadosPorOcupacionDistinct as $tipo)

	
	<div>{{ $tipo }}</div>

@endforeach





@endsection
