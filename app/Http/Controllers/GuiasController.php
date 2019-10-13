<?php

namespace App\Http\Controllers;

use App\Guia;
use App\Localidad;
use App\Titulo;
use Illuminate\Http\Request;

class GuiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guias = Guia::all();


        return view('guias.index', compact('guias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localidades = Localidad::all();
        
        $titulos = Titulo::all();

        return view('guias.create', compact('localidades', 'titulos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        /*$nombreLocalidad = request()->input('localidad');

        $localidades = Localidad::all();

        $idLocalidadSelected = $localidades->map(function ($localidad, $key) {
            if ($localidad->nombre === request()->input('localidad')) {

                return $localidad->id;
            }
        });


        $attributes['localidad_id'] = $idLocalidadSelected[1];

        return $attributes;*/


        $attributes = request()->validate([
            'titulo_id' => ['nullable'],
            'localidad_id' => ['required'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'identificacion' => ['required'],
            'fechaNacimiento' => ['required', 'date_format:Y-m-d'],
            'direccion' => ['required', 'min:3'],
            'telefono' => ['required', 'min:3'],
            'email' => ['required', 'email', 'min:3'],
        ]);

     

        Guia::create($attributes);
        

        return redirect('/pdc/guias'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function show(Guia $guia)
    {
        return view('guias.show', compact('guia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function edit(Guia $guia)
    {
        return view('guias.edit', compact('guia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function update(Guia $guia)
    {
        $attributes = request()->validate([
            'titulo_id' => ['required'],
            'localidad_id' => ['required'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'fechaNacimiento' => ['required'],
            'direccion' => ['required', 'min:3'],
            'telefono' => ['required', 'min:3'],
            'email' => ['required', 'min:3'],
        ]);

        $guia->update($attributes);



        return redirect('/pdc/guias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guia  $guia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guia $guia)
    {
        $guia->delete();


        return redirect('/pdc/guias');
    }
}
