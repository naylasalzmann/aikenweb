<?php

namespace App\Http\Controllers;

use App\Aventurero;
use App\Localidad;
use Illuminate\Http\Request;

class AventurerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aventureros = Aventurero::all()->sortByDesc('id');
        $localidades = Localidad::all();

        $selectedLocalidad = null;

        if (request()->filled('localidad')) {

            $selectedLocalidad = Localidad::where('nombre', request()->input('localidad'))->first();

            $aventureros = Aventurero::where('localidad_id', $selectedLocalidad->id)->get(); 
        }


        return view('aventureros.index', compact('aventureros', 'localidades', 'selectedLocalidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reserva = request()->all();
        $localidades = Localidad::all();

        

        return view('aventureros.create', compact('reserva', 'localidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'localidad_id' => ['nullable'],
            'identificacion' => ['nullable'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'fecha_nacimiento' => ['nullable'],
            'direccion' => ['nullable'],
            'telefono' => ['nullable'],
            'email' => ['nullable']
        ]);


        aventurero::create($attributes);
        

        return redirect('/pdc/aventureros');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aventurero  $aventurero
     * @return \Illuminate\Http\Response
     */
    public function show(Aventurero $aventurero)
    {

        return view('aventureros.show', compact('aventurero'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aventurero  $aventurero
     * @return \Illuminate\Http\Response
     */
    public function edit(Aventurero $aventurero)
    {

        return view('aventureros.edit', compact('aventurero'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aventurero  $aventurero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aventurero $aventurero)
    {
        $attributes = request()->validate([
            'localidad_id' => ['nullable'],
            'identificacion' => ['nullable'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'fecha_nacimiento' => ['nullable'],
            'direccion' => ['nullable'],
            'telefono' => ['nullable'],
            'email' => ['nullable'],
        ]);

        $aventurero->update($attributes);



        return redirect('/pdc/aventureros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aventurero  $aventurero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aventurero $aventurero)
    {
        //
    }
}
