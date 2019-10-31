<?php

namespace App\Http\Controllers;

use App\Fecha;
use App\Salida;
use App\Guia;
use App\Aventurero;
use App\Confirmacion;
use App\TipoSalida;
use Illuminate\Http\Request;

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


    	$fechasOrdenadasPorOcupacion = $fechasPasadas->sortByDesc('cupo');
    	$tiposDeSalidaOrdenadosPorOcupacion = $fechasOrdenadasPorOcupacion->map(function ($fecha) {
    		return $fecha->salida->tipo->descripcion;

    	});


    	$tiposDeSalidaOrdenadosPorOcupacionDistinct =  $tiposDeSalidaOrdenadosPorOcupacion->unique();



        return view('pdc', compact(
        		'fechasPendientes', 
        		'fechasPasadasConcretadas', 
        		'fechasPasadas', 
        		'guias', 
        		'aventureros', 
        		'fechasOrdenadasPorOcupacion', 
        		'tiposDeSalidaOrdenadosPorOcupacionDistinct'
        	));
    }
}
