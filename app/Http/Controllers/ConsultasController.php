<?php

namespace App\Http\Controllers;

use App\Consulta;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::all()->sortByDesc('id');


        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'salida_id' => ['nullable'],
            'pais_id' => ['required'],
            'provincia_id' => ['nullable'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'telefono' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'descripcion' => ['required', 'min:5'],
        ]);

     

        Consulta::create($attributes);
        

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {

        return view('consultas.show', compact('consulta'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(Consulta $consulta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        $consulta->update([

            'vista' => request()->has('vista')
        ]);

        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consulta)
    {
        //
    }
}
