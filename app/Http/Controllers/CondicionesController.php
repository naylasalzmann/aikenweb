<?php

namespace App\Http\Controllers;

use App\Condicion;

class CondicionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $condiciones = Condicion::all();


        return view('condiciones.index', compact('condiciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('condiciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes = request()->validate([
            'titulo' => ['required', 'min:3'],
            'descripcion' => ['required', 'min:3']
        ]);


        Condicion::create($attributes);
        

        return redirect('/pdc/condiciones'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\condiciones  $condiciones
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $condicion = Condicion::findOrFail($id);


        return view('condiciones.show', compact('condicion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\condiciones  $condiciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $condicion = Condicion::findOrFail($id);


        return view('condiciones.edit', compact('condicion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\condiciones  $condiciones
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $condicion = Condicion::findOrFail($id);

        $attributes = request()->validate([
            'titulo' => ['required', 'min:3'],
            'descripcion' => ['required', 'min:3']
        ]);

        $condicion->update($attributes);



        return redirect('/pdc/condiciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\condiciones  $condiciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Condicion::findOrFail($id)->delete();


        return redirect('/pdc/condiciones');
    }
}
