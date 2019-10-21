<?php

namespace App\Http\Controllers;

use App\Fecha;

use App\Salida;

class SalidaFechasController extends Controller

{
    
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
