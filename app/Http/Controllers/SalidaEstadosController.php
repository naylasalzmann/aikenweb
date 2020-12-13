<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Salida;

class SalidaEstadosController extends Controller
{
    public function update(Salida $salida) {

        if (request()->has('ocultar')) {

            $salida->update([

             'oculta' => true

            ]);
        }

        if (request()->has('mostrar')) {

             $salida->update([

             'oculta' => false

            ]);
        }

        return back();
    }
}
