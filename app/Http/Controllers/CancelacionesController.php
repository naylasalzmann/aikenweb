<?php

namespace App\Http\Controllers;

use App\Cancelacion;
use App\Confirmacion;
use App\Reserva;
use App\Fecha;
use Illuminate\Http\Request;

class CancelacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cancelaciones = Cancelacion::all()->sortByDesc('id');


        return view('cancelaciones.index', compact('cancelaciones'));
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
    public function store(Request $request, Cancelacion $cancelacion)
    {
        $attributes = request()->validate([
            'codigo' => ['required'],
            'identificacion' => ['required'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'telefono' => ['required'],
            'email' => ['required'],
            'monto_total' => ['required'],
            'descripcion' => ['nullable']
        ]);

        // creo la cancelacion
        Cancelacion::create($attributes);

        // resto los aventureros en el cupo de esa fecha
        $cant_aventureros = request()->cant_aventureros;
        $fecha = Fecha::find(request()->fecha_id);


        $cancelacion->updateCupoFecha($cant_aventureros, $fecha);

        // borro la reserva y la confirmacion
        $reserva = Reserva::find(request()->reserva_id);

        $reserva->delete();



        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cancelacion  $cancelacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cancelacion = Cancelacion::findOrFail($id);

        return view('cancelaciones.show', compact('cancelacion'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cancelacion  $cancelacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cancelacion $cancelacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cancelacion  $cancelacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cancelacion $cancelacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cancelacion  $cancelacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cancelacion $cancelacion)
    {
        //
    }
}
