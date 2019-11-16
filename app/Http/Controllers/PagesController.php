<?php

namespace App\Http\Controllers;

use App\Salida;
use App\Pais;
use App\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function index() {
        
        $salidas = Salida::all();

        $photosPorSalida = $salidas->map(function ($salida) {

            $photos = Storage::disk('public')->files('/salidas/' . $salida->id);
            $firstPhoto = $photos[0];
            $ph = [
                    "portada" => $firstPhoto, 
                    "id" => $salida->id,
                    "titulo" => $salida->titulo,
                    "subtitulo" => $salida->subtitulo
                ];

            return $ph; 
        });

        //dd($photosPorSalida->pluck('photos')->pluck(0));
        //dd($photosPorSalida->pluck('photos'));
        //$photos = Storage::disk('public')->files('/salidas/');

        return view('welcome', compact('salidas', 'photos',     'photosPorSalida'));
    }
    
    
    public function show($id) {
            
        $salida = Salida::findOrFail($id);
        $paises = Pais::all();
        $provincias = Provincia::all();	
        $photos = Storage::disk('public')->allFiles('/salidas/' . $id);



        return view('ficha', compact('salida', 'paises', 'provincias', 'photos')); 
    }

    
}
