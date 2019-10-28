<?php

namespace App\Http\Controllers;

use App\Confirmacion;
use App\Fecha;
use App\Reserva;
use Illuminate\Http\Request;


class ConfirmacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirmaciones = Confirmacion::all()->sortByDesc('id');
        

        return view('confirmaciones.index', compact('confirmaciones'));
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
    public function store(Request $request, Confirmacion $confirmacion)
    {
        $attributes = request()->validate([
            'reserva_id' => ['required']
        ]);

        // creo la confirmación
        Confirmacion::create($attributes);


        // actualizo el cupo de la fecha de la salida
        $cant_aventureros = request()->cant_aventureros;
        $fecha = Fecha::find(request()->fecha_id);

        $confirmacion->updateCupoFecha($cant_aventureros, $fecha);

        // actualizo la reserva a confirmada
        $reserva = Reserva::find(request()->reserva_id);
        $confirmacion->updateReservaConfirmada($reserva);


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Confirmacion  $confirmacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $confirmacion = Confirmacion::findOrFail($id);

        return view('confirmaciones.show', compact('confirmacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Confirmacion  $confirmacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Confirmacion $confirmacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Confirmacion  $confirmacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confirmacion $confirmacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Confirmacion  $confirmacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Confirmacion $confirmacion)
    {
        //
    }
}
