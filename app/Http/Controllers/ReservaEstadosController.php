<?php

namespace App\Http\Controllers;

use App\Reserva;
use Illuminate\Http\Request;

class ReservaEstadosController extends Controller
{
    
    public function update(Reserva $reserva) 

	{
		$reserva->update([

			'estado_id' => request()->estado_id
		]);

		return back(); 
	}
}
