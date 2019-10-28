<?php

namespace App\Http\Controllers;

use App\TipoSalida;

class TiposSalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoSalida::all();


        return view('tiposSalida.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposSalida.create');
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
            'descripcion' => ['required', 'min:3']
        ]);


        TipoSalida::create($attributes);
        

        return redirect('/pdc/tiposSalida');    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo = TipoSalida::findOrFail($id);


        return view('tiposSalida.show', compact('tipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = TipoSalida::findOrFail($id);


        return view('tiposSalida.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $tipo = TipoSalida::findOrFail($id);

        $attributes = request()->validate([
            'descripcion' => ['required', 'min:3']
        ]);

        $tipo->update($attributes);



        return redirect('/pdc/tiposSalida');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoSalida::findOrFail($id)->delete();


        return redirect('/pdc/tiposSalida');
    }
}
