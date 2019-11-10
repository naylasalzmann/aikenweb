<?php

namespace App\Http\Controllers;

use App\Cobro;
use Illuminate\Http\Request;

class CobrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cobros = Cobro::all()->sortByDesc('id');


        return view('cobros.index', compact('cobros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reserva = request()->all();

        return view('cobros.create', compact('reserva'));
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
            'identificacion' => ['nullable'],
            'salida_id' => ['nullable'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'codigo_reserva' => ['nullable'],
            'importe' => ['required'],
            'concepto' => ['required'],
            'fecha' => ['required']
        ]);


        Cobro::create($attributes);
        

        return redirect('/pdc/cobros');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function show(Cobro $cobro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function edit(Cobro $cobro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cobro $cobro)
    {
        $cobro->update([

            'anulado' => request()->has('anulado')
        ]);

        return back(); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cobro $cobro)
    {
        //
    }
}
