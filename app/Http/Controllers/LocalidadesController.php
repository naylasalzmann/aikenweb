<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;
use App\Provincia;
use App\Localidad;

class LocalidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localidades = Localidad::all();

        return view('localidades.index', compact('localidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Pais::all();
        $provincias = Provincia::all();


        return view('localidades.create', compact('paises', 'provincias'));
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
            'nombre' => ['required'],
            'provincia_id' => ['required'],
        ]);


        Localidad::create($attributes);
        

        return redirect('/pdc/localidades');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $localidad = Localidad::findOrFail($id);

        return view('localidades.show', compact('localidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $localidad = Localidad::findOrFail($id);
        $provincias = Provincia::all();


        return view('localidades.edit', compact('localidad', 'provincias'));
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
        $localidad = Localidad::findOrFail($id);

        $attributes = request()->validate([
            'nombre' => ['required'],
            'provincia_id' => ['required']
        ]);

        $localidad->update($attributes);



        return redirect('/pdc/localidades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Localidad::findOrFail($id)->delete();


        return redirect('/pdc/localidades');
    }
}
