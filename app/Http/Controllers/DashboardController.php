<?php

namespace App\Http\Controllers;

use App\Fecha;
use App\Salida;
use App\Guia;
use App\Aventurero;
use App\Confirmacion;
use App\Cancelacion;
use App\TipoSalida;
use App\Consulta;
use App\Pais;
use App\Provincia;
use App\Reserva;
use App\Cobro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Charts\SampleChart;

class DashboardController extends Controller
{
    public function index() {

    	$fechasPendientes = Fecha::where('inicio', '>', now())->oldest('inicio')->get();
    	$fechasPasadasConcretadas = Fecha::where('inicio', '<', now())
    										->where('concretada', true)		
    										->oldest('inicio')->get();
    	
  		$fechasPasadas = Fecha::where('inicio', '<', now())->oldest('inicio')->get();
    	$guias = Guia::all();
    	$aventureros = Aventurero::all();
    	$tiposSalida = TipoSalida::all();


    	// PORCENTAJE DE CUPOS RESERVADOS POR FECHA
    	$fechasOrdenadasPorOcupacion = $fechasPasadas->sortByDesc('cupo');


    	// CUPOS RESERVADOS POR SALIDA
		$s = Salida::all();
		$cuposReservadosPorSalida = $s->map(function ($salida) {
			return [
					'titulo' => $salida->titulo, 
					'tipo_id' => $salida->tipo->id, 
					'tipo' => $salida->tipo->descripcion,
					'cupos' =>$salida->fechas->sum('cupo')
				];
		});

    	$fechasOrdenadasPorOcupacionPorSalida = $fechasOrdenadasPorOcupacion->groupBy('salida_id');

    	// TIPOS ORDENADOS POR OCUPACION CON CANTIDAD
		$cuposPorTipo = $cuposReservadosPorSalida->groupBy('tipo');

		$cantidadDeCuposPorTipo = $cuposPorTipo->map(function ($value, $key) {
			return $value->pluck('cupos')->sum();
		});

		$tiposOrdenadosPorOcupacion = collect($cantidadDeCuposPorTipo->sortByDesc('cupos'));


		// DATOS PARA CHARTS
		
		$meses =  [ 
			"Octubre" ,
			"Noviembre" ,
			"Diciembre",
    	];

		$borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        
        $tiposChart = new SampleChart;
        $tiposChart->minimalist(true);
        $tiposChart->displaylegend(true);
        $tiposChart->labels($tiposOrdenadosPorOcupacion->keys());
        $tiposChart->dataset('Tipos de salida por ocupación', 'doughnut', $tiposOrdenadosPorOcupacion->values())
			       ->color($borderColors)
			       ->backgroundcolor($fillColors); 



    	// CONSULTAS POR MES
    	$consultas = Consulta::all();
    	$consultasPorMes = $consultas->groupBy('created_at.month');


    	$cantidadDeConsultasPorMes = $consultasPorMes->map(function ($consulta, $key) {
    		
    		return $consulta->count();
    	});

    	$consultasChart = new SampleChart;
        $consultasChart->labels($meses);
        $consultasChart->dataset('Consultas por mes', 'line', 
        		$cantidadDeConsultasPorMes->values()
        );


    	// CONSULTAS POR SALIDA
    	$consultasPorSalida = $consultas->groupBy('salida_id');

    	$cantidadDeConsultasPorSalida = $consultasPorSalida->map(function ($consulta, $key) {

 			$salida = Salida::find($key);


    		return collect(['cantidad' => $consulta->count(), 'titulo' => $salida->titulo]);
    	});
    	
    	$salidasMasConsultadas = $cantidadDeConsultasPorSalida->sortByDesc('cantidad');

    	$consultasPorSalidaChart = new SampleChart;
        $consultasPorSalidaChart->minimalist(true);
        $consultasPorSalidaChart->displaylegend(true);
        $consultasPorSalidaChart->labels($salidasMasConsultadas->pluck('titulo'));
        $consultasPorSalidaChart->dataset(
        	'Consultas por salida', 
        	'doughnut', 
        	$salidasMasConsultadas->pluck('cantidad')
        )
		->color($borderColors)
		->backgroundcolor($fillColors); 


    	// CONSULTAS POR PAIS
    	$consultasConPais = Consulta::whereNotNull('pais_id')->get();
    	$consultasPorPais = $consultasConPais->groupBy('pais_id');

    	$cantidadDeConsultasPorPais = $consultasPorPais->map(function ($consulta, $key) {

 			$pais = Pais::find($key);


    		return collect(['cantidad' => $consulta->count(), 'pais' => $pais->nombre]);
    	});
    	
    	$paisesDesdeDondeMasSeConsulta = $cantidadDeConsultasPorPais->sortByDesc('cantidad');

    	$consultasPorPaisChart = new SampleChart;
        $consultasPorPaisChart->minimalist(true);
        $consultasPorPaisChart->displaylegend(true);
        $consultasPorPaisChart->labels($cantidadDeConsultasPorPais->pluck('pais'));
        $consultasPorPaisChart->dataset(
        	'Consultas por país', 
        	'pie', 
        	$cantidadDeConsultasPorPais->pluck('cantidad')
        )
		->color($borderColors)
		->backgroundcolor($fillColors); 



    	// CONSULTAS POR PROVINCIA
    	$consultasConProvincia = Consulta::whereNotNull('provincia_id')->get();

    	$consultasPorProvincia = $consultasConProvincia->groupBy('provincia_id');

    	$cantidadDeConsultasPorProvincia = $consultasPorProvincia->map(function ($consulta, $key) {

 			$provincia = Provincia::find($key);

    		return collect(['cantidad' => $consulta->count(), 'provincia' => $provincia->nombre]);
    	});
    	
    	$provinciasDesdeDondeMasSeConsulta = $cantidadDeConsultasPorProvincia->sortByDesc('cantidad');

    	$consultasPorProvinciaChart = new SampleChart;
        $consultasPorProvinciaChart->minimalist(true);
        $consultasPorProvinciaChart->displaylegend(true);
        $consultasPorProvinciaChart->labels($cantidadDeConsultasPorProvincia->pluck('provincia'));
        $consultasPorProvinciaChart->dataset(
        	'Consultas por provincia', 
        	'pie', 
        	$cantidadDeConsultasPorProvincia->pluck('cantidad')
        )
		->color($borderColors)
		->backgroundcolor($fillColors); 


    	// CONFIRMACIONES POR MES
    	$confirmaciones = Confirmacion::all();
    	$confirmacionesPorMes = $confirmaciones->groupBy('created_at.month');

    	$cantidadDeConfirmacionesPorMes = $confirmacionesPorMes->map(function ($confirmacion, $key) {
    		
    		return $confirmacion->count();
    	});

    	// CANCELACIONES POR MES
    	$cancelaciones = Cancelacion::all();
    	$cancelacionesPorMes = $cancelaciones->groupBy('created_at.month');

    	$cantidadDeCancelacionesPorMes = $cancelacionesPorMes->map(function ($cancelacion, $key) {
    		
    		return $cancelacion->count();
    	});

   
   		// CHART DE CONFIRMACIONES Y CANCELACIONES 
    	$confirmacionesChart = new SampleChart;
        $confirmacionesChart->labels($meses);
        $confirmacionesChart->dataset(
        	'Reservas confirmadas', 
        	'line',
        	$cantidadDeConfirmacionesPorMes->values() 
        )
        ->color("rgba(22,160,133, 1.0)")
        ->backgroundcolor("rgba(22,160,133, 0.2)");
        $confirmacionesChart->dataset(
        	'Reservas canceladas', 
        	'line',
        	$cantidadDeCancelacionesPorMes->values() 
        )
        ->color("rgba(255, 99, 132, 1.0)")
        ->backgroundcolor("rgba(255, 99, 132, 0.2)");



    	// RESERVAS POR MES
    	$reservas = Reserva::all();
    	$reservasPorMes = $reservas->groupBy('created_at.month');

    	$cantidadDeReservasPorMes = $reservasPorMes->map(function ($reserva, $key) {
    		
    		return $reserva->count();
    	});

    	// RESERVAS ACEPTADAS POR MES
    	$reservasAceptadas = Reserva::where('estado_id', 2)->get();
    	$reservasAceptadasPorMes = $reservasAceptadas->groupBy('created_at.month');

    	$cantidadDeReservasAceptadasPorMes = $reservasAceptadasPorMes->map(function ($reserva, $key) {
    		
    		return $reserva->count();
    	});

    	// RESERVAS RECHAZADAS POR MES
    	$reservasRechazadas = Reserva::where('estado_id', 3)->get();
    	$reservasRechazadasPorMes = $reservasRechazadas->groupBy('created_at.month');

    	$cantidadDeReservasRechazadasPorMes = $reservasRechazadasPorMes->map(function ($reserva, $key) {
    		
    		return $reserva->count();
    	});

    	// CHART RECIBIDAS, ACEPTADAS Y RECHAZADAS
    	$estadosChart = new SampleChart;
        $estadosChart->labels($meses);
        $estadosChart->dataset(
        	'Todas las reservas', 
        	'line',
        	$cantidadDeReservasPorMes->values() 
        );
        $estadosChart->dataset(
        	'Reservas aceptadas', 
        	'line',
        	$cantidadDeReservasAceptadasPorMes->values() 
        )
        ->color("rgba(22,160,133, 1.0)")
        ->backgroundcolor("rgba(22,160,133, 0.2)");
        $estadosChart->dataset(
        	'Reservas rechazadas', 
        	'line',
        	$cantidadDeReservasRechazadasPorMes->values() 
        )
        ->color("rgba(255, 99, 132, 1.0)")
        ->backgroundcolor("rgba(255, 99, 132, 0.2)");



    	//PORCENTAJE DE CONFIRMADAS SOBRE TODAS LAS RESERVAS (CANCELADAS Y RECIBIDAS)
    	$todas = $cantidadDeReservasPorMes->map(function ($value, $key) use ($cantidadDeCancelacionesPorMes){
    		
    		
    		return isset($cantidadDeCancelacionesPorMes[$key]) ? 
    				$cantidadDeCancelacionesPorMes[$key] + $value : 
    				$value;
    	});


    	$porcDeConfSobreRecibidas = $todas->map(function ($value, $key) use ($cantidadDeConfirmacionesPorMes) {
    		
   			// si falla al no haber confirmaciones es esto, de no haber hay que mostrar algo en lugar del porcentaje
    		$porcentajeConfirmaciones = isset($cantidadDeConfirmacionesPorMes[$key]) ? 
    									$cantidadDeConfirmacionesPorMes[$key] / $value * 100 : 
    									0;
    		return round($porcentajeConfirmaciones);								
    	});


    	// CHART DE CONFIRMADAS SOBRE RECIBIDAS
    	$porcentajeConfirmadasChart = new SampleChart;
        $porcentajeConfirmadasChart->labels($meses);
        $porcentajeConfirmadasChart->height(100);
        $porcentajeConfirmadasChart->dataset(
        	'Reservas confirmadas', 
        	'line',
        	$porcDeConfSobreRecibidas->values() 
        )
        ->color("rgba(22,160,133, 1.0)")
        ->backgroundcolor("rgba(22,160,133, 0.2)");
       


    	// EDAD PROMEDIO DE AVENTUREROS
    	$aventurerosConFechaDeNacimiento = Aventurero::whereNotNull('fecha_nacimiento')->get();
    	$edadPromedio = $aventurerosConFechaDeNacimiento->avg(function ($aventurero) {
           return $aventurero->getAge();
        });


    	// TOTAL DE INGRESOS DEL MES
      	$cobrosNoAnulados = Cobro::where('anulado', false)->get();
    	$cobrosPorMes = $cobrosNoAnulados->groupBy('created_at.month');

    	$totalCobrosPorMes = $cobrosPorMes->map(function ($cobro, $key) {
    		
    		return $cobro->sum('importe');
    	});


    	$cobrosPorMesChart = new SampleChart;
        $cobrosPorMesChart->labels($meses);
        $cobrosPorMesChart->dataset(
        	'Ingresos por mes', 
        	'line',
        	$totalCobrosPorMes->values() 
        )
        ->color("rgba(22,160,133, 1.0)")
        ->backgroundcolor("rgba(22,160,133, 0.2)");


    	// INGRESOS POR SALIDA
    	$cobros = Cobro::whereNotNull('salida_id')->get();

    	$cobrosPorSalida = $cobros->groupBy('salida_id');

    	
    	$totalCobrosPorSalida = $cobrosPorSalida->map(function ($cobro, $key) {

 			$salida = Salida::find($key);


    		return collect(['total' => $cobro->sum('importe'), 'titulo' => $salida->titulo]);
    	});

    	$cobrosPorSalidaChart = new SampleChart;
        $cobrosPorSalidaChart->minimalist(true);
        $cobrosPorSalidaChart->displaylegend(true);
        $cobrosPorSalidaChart->labels($totalCobrosPorSalida->pluck('titulo'));
        $cobrosPorSalidaChart->dataset('Ingresos por salida', 'pie', $totalCobrosPorSalida->pluck('total'))
			       ->color($borderColors)
			       ->backgroundcolor($fillColors); 


		


        return view('pdc', compact(
        		'fechasPendientes', 
        		'fechasPasadasConcretadas', 
        		'fechasPasadas', 
        		'guias', 
        		'aventureros', 
        		'fechasOrdenadasPorOcupacion', 
        		'tiposOrdenadosPorOcupacion',
        		'tiposDeSalidaOrdenadosPorOcupacion',
        		'cantidadDeConsultasPorMes',
        		'salidasMasConsultadas',
        		'paisesDesdeDondeMasSeConsulta',
        		'provinciasDesdeDondeMasSeConsulta',
        		'cantidadDeConfirmacionesPorMes',
        		'cantidadDeCancelacionesPorMes',
        		'cantidadDeReservasPorMes',
        		'cantidadDeReservasAceptadasPorMes',
        		'cantidadDeReservasRechazadasPorMes',
        		'porcDeConfSobreRecibidas',
        		'edadPromedio',
        		'totalCobrosPorMes',
        		'totalCobrosPorSalida',
        		'consultasChart',
        		'tiposChart',
        		'consultasPorSalidaChart',
        		'consultasPorPaisChart',
        		'consultasPorProvinciaChart',
        		'confirmacionesChart',
        		'estadosChart',
        		'porcentajeConfirmadasChart',
        		'cobrosPorMesChart',
        		'cobrosPorSalidaChart'
        	));
    }
}
