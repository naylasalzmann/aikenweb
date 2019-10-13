<?php

namespace App\Http\Controllers;

use App\Titulo;

class TitulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulos = Titulo::all();


        return view('titulos.index', compact('titulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('titulos.create');
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


        Titulo::create($attributes);
        

        return redirect('/pdc/titulos'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function show(Titulo $titulo)
    {
        return view('titulos.show', compact('titulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Titulo $titulo)
    {
        return view('titulos.edit', compact('titulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function update(Titulo $titulo)
    {

        $attributes = request()->validate([
            'descripcion' => ['required', 'min:3']
        ]);

        $titulo->update($attributes);



        return redirect('/pdc/titulos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Titulo  $titulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titulo $titulo)
    {
        $titulo->delete();


        return redirect('/pdc/titulos');
    }
}
