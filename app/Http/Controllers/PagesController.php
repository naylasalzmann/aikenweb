<?php

namespace App\Http\Controllers;

use App\Salida;
use App\Pais;
use App\Provincia;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        
        $salidas = Salida::all();

        return view('welcome', compact('salidas'));
    }
    
    
    public function show($id) {
            
        $salida = Salida::findOrFail($id);
        $paises = Pais::all();
        $provincias = Provincia::all();	


        return view('ficha', compact('salida', 'paises', 'provincias')); 
    }

    
}
