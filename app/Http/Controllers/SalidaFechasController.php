<?php

namespace App\Http\Controllers;

use App\Fecha;

use App\Salida;

class SalidaFechasController extends Controller

{
	public function index(Fecha $fecha)
    {
    	$fechasPendientes = Fecha::where('inicio', '>', now())->oldest('inicio')->get();
    	// fechas que no se filtran
    	$fechasPendientesTodas = Fecha::where('inicio', '>', now())->oldest('inicio')->get();
    	$selectedFecha = null;

    	if (request()->filled('fecha_id')) {

            $fechasPendientes = Fecha::where('id', request()->fecha_id)->get();
            $selectedFecha = Fecha::find(request()->fecha_id);

        }


        return view('fechas.index', compact('fechasPendientes', 'selectedFecha', 'fechasPendientesTodas'));
    }
    
	public function store(Salida $salida) 

	{
		$attributes = request()->validate([
            'inicio' => ['required'],
            'fin' => ['required'],
        ]);

		$salida->addFecha($attributes);

		return back();

	}

	public function update(Fecha $fecha) 

	{
			
		$fecha->update([

			'concretada' => request()->has('concretada')
		]);

		return back(); 
	}

}
