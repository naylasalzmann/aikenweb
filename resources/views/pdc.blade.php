@extends('layoutPdc')

@section('title', 'Dashboard')

@section('content')

<div class="row">
	<div class="input-field col s12">
		<h1>Dashboard</h1>
	</div>
</div>


<!--<h6>Fechas de salidas pendientes</h6>

@foreach ($fechasPendientes as $fecha)
	<div>{{ $fecha->getFormattedInicio() }}  {{ $fecha->salida->titulo }}</div>
@endforeach -->

<!--<div id="printTable">
	<h4>Salidas pendientes</h4>
	<ul>
	 	<table >
		    <thead>
		      <tr>
		          <th>Inicio</th>
		          <th>Salida</th>
		          <th>Zona</th>
		      </tr>
		    </thead>	

    		<tbody>
			@foreach ($fechasPendientes as $fecha)
	          	<tr>
	            <td>{{ $fecha->getFormattedInicio() }}</td>
	            <td>{{ $fecha->salida->titulo }}</td>
	            <td>{{ $fecha->salida->zona->nombre }}</td>
	          </tr>
			@endforeach	
        </tbody>
      </table>
	</ul>
</div>
-->

<!--<h6>Nuestros guías</h6>

@foreach ($guias as $guia)
	<div>{{ $guia->nombre }}  {{ $guia->apellido }}</div>
@endforeach

<a href="">Imprimir listado de guías</a>

<h6>Aventureros de Aiken</h6>
@foreach ($aventureros as $aventurero)
	<div>{{ $aventurero->nombre }}  {{ $aventurero->apellido }}</div>
@endforeach -->


<!--<h6>Quienes van a venir próximamente</h6>

@foreach($fechasPendientes as $fecha)
	<div>{{ $fecha->salida->titulo }}, {{ $fecha->getFormattedInicio() }}</div>

 	@foreach($fecha->confirmaciones as $confirmacion)
 		<div>{{ $confirmacion->reserva->nombre }}</div>
	@endforeach
@endforeach -->


<!--<h6>Salidas guiadas por cada guía (salidas asignadas a cada guía)</h6>

 @foreach ($guias as $guia)

 	<div>{{ $guia->nombre }} {{ $guia->apellido }}</div>

 	@foreach ($guia->salidas as $salida)
 		<div>{{ $salida->titulo }}</div>
 	@endforeach
 @endforeach -->

<div class="row">
	<div class="col s6">
		<h6>Total de ingresos por mes</h6>
		<div style="width: 100%">
		    {!! $cobrosPorMesChart->container() !!}
		</div>
	</div>
	<div class="col s6">
		<h6>Total de ingresos por salida</h6>
		<div style="width: 100%">
		    {!! $cobrosPorSalidaChart->container() !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col s8">
		<h6>Porcentaje de reservas confirmadas sobre recibidas por mes</h6>
		@foreach ($porcDeConfSobreRecibidas as $key => $porc)

		<div>Mes {{ $key }}: {{ round($porc, 1) }}% </div>
		@endforeach

		<div style="width: 100%">
		    {!! $porcentajeConfirmadasChart->container() !!}
		</div>
	</div>

	<div class="col s4">
		<div class="card-panel">
			<h6>Edad promedio de aventureros</h6>
			<div class="row">
				<div class="col s6">
					<i class="material-icons medium teal-text">person</i>
				</div>
				<div class="col s6">
					<h5>{{ round($edadPromedio) }}</h5>
					<span>Años</span>
				</div>
			</div>
		</div>
	</div>
</div>

<h6>Cantidad de consultas por mes</h6>
<!--@foreach ($cantidadDeConsultasPorMes as $key => $cant)
<div>Mes {{ $key }}: {{ $cant }} consultas</div>
@endforeach -->
<div style="width: 100%">
    {!! $consultasChart->container() !!}
</div>


<h6>Cantidad de reservas recibidas, aceptadas y rechazadas por mes</h6>
<div style="width: 100%">
    {!! $estadosChart->container() !!}
</div>

<h6>Cantidad de reservas confirmadas y canceladas por mes</h6>
<div style="width: 100%">
    {!! $confirmacionesChart->container() !!}
</div>


<div class="row">
	<div class="input-field col s6">
			
		<h6>Tipos de salida más reservados</h6>
		<div style="width: 100%">
		    {!! $tiposChart->container() !!}
		</div>

		<h6>Paises desde donde más se consulta</h6>
		<div style="width: 100%">
		    {!! $consultasPorPaisChart->container() !!}
		</div>

	</div>
	<div class="input-field col s6">
		<h6>Salidas más consultadas</h6>
		<div style="width: 100%">
		    {!! $consultasPorSalidaChart->container() !!}
		</div>

		<h6>Provincias desde donde más se consulta</h6>
		<div style="width: 100%">
		    {!! $consultasPorProvinciaChart->container() !!}
		</div>
	</div>
</div>

		
<div class="row">
	<div class="col s11" id="guiadas">
		<h5>Informe de guiadas</h5>
		<p>fechas de salidas concretadas que guió cada guía</p	>
		@foreach ($fechasPasadasConcretadas as $fecha)
			<div><b>{{ $fecha->getFormattedInicio() }}</b></div>
			<div>Salida: {{ $fecha->salida->titulo }}</div>

			@foreach ($fecha->salida->guias as $guia)
			<div>{{ $guia->nombre }} {{ $guia->apellido }}</div>
			@endforeach
		@endforeach
	</div>
	<div class="col s1">
		<a class="teal-text" href="" onClick="printGuiadas()" target="_blank" >
			<i class="material-icons">print</i>
		</a>
	</div>
</div>

<div class="row">
	<div class="col s11" id="ocupacion">
		<h5>Informe de ocupación de salidas</h5>

		<h6><b>Salidas que no llegaron al cupo mínimo (antes del inicio)</b></h6>

		@foreach ($fechasPasadas as $fecha)
			@if ( $fecha->cupo < $fecha->salida->cupo_minimo)
			<div>{{ $fecha->salida->titulo }} ({{ $fecha->getFormattedInicio() }})</div>
			<div>Cupo reservado: {{ $fecha->cupo }}</div>
			<div>Cupo mínimo de la salida: {{ $salida->cupo_minimo }}</div>
			@endif
		@endforeach

		<h6><b>Salidas agotadas</b></h6>

		@foreach ($fechasPasadas as $fecha)
			@if ( $fecha->cupo >= $fecha->salida->cupo_maximo)
			<div>{{ $fecha->salida->titulo }} ({{ $fecha->getFormattedInicio() }})</div>
			<div>Cupo reservado: {{ $fecha->cupo }}</div>
			<div>Cupo máximo de la salida: {{ $salida->cupo_maximo }}</div>
			@endif
		@endforeach

		<h6><b>Porcentaje de cupos reservados por fecha</b></h6>
		@foreach ($fechasOrdenadasPorOcupacion as $fecha)
			<div>{{ $fecha->salida->titulo }} ({{ $fecha->getFormattedInicio() }})</div>
			<div>Porcentaje: {{ round($fecha->cupo / $salida->cupo_maximo * 100 , 1) }}%</div>
		@endforeach
	</div>
	<div class="col s1">
		<a class="teal-text" href="" onClick="printOcupacion()" target="_blank" >
			<i class="material-icons">print</i>
		</a>
	</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" charset="utf-8"></script>

{!! $consultasChart->script() !!}
{!! $tiposChart->script() !!}
{!! $consultasPorSalidaChart->script() !!}
{!! $consultasPorPaisChart->script() !!}
{!! $consultasPorProvinciaChart->script() !!}
{!! $confirmacionesChart->script() !!}
{!! $estadosChart->script() !!}
{!! $porcentajeConfirmadasChart->script() !!}
{!! $cobrosPorMesChart->script() !!}
{!! $cobrosPorSalidaChart->script() !!}
@endsection

@section('scripts')
<script type="text/javascript">

    function printGuiadas() {
        const divToPrint = document.getElementById("guiadas");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    function printOcupacion() {
        const divToPrint = document.getElementById("ocupacion");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
</script>
@endsection
