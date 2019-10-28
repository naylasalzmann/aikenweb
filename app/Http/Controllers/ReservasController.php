<?php

namespace App\Http\Controllers;

use App\Reserva;
use App\Fecha;
use App\Localidad;
use App\Metodo;
use App\Estado;
use App\Salida;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$noConfirmadas = Reserva::doesntHave('confirmacion')->get();
        $noConfirmadas = Reserva::where('confirmada', false)->latest()->get();
        $estados = Estado::all();
        $salidas = Salida::all();

        $selectedEstado = null;
        $selectedSalida = null;

        if (request()->filled('estado_id_filtro')) {

            $selectedEstado = Estado::find(request()->input('estado_id_filtro'));
            $noConfirmadas = Reserva::doesntHave('confirmacion')
                                        ->where('estado_id', $selectedEstado->id)
                                        ->get();
        }

        if (request()->filled('salida_id_filtro')) {

            $selectedSalida = Salida::find(request()->input('salida_id_filtro'));
            $reservasDeEsaSalida = $selectedSalida->reservas->where('confirmada', false);


            $noConfirmadas = $reservasDeEsaSalida;
            
        }


        return view('reservas.index', compact(
            'noConfirmadas', 
            'estados', 
            'selectedEstado', 
            'salidas', 
            'selectedSalida'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $fecha = Fecha::findOrFail($id);
        //$condiciones = Condicion::all();
        $localidades = Localidad::all();

        // metodos de pago
        $metodos = Metodo::all(); 


        return view('reservas.create', compact('fecha', 'localidades', 'metodos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $random = Str::upper(Str::random(3));
        $codigo = "AIK".$request->fecha_id.$random;


        $attributes = request()->validate([
            'metodo_pago_id' => ['required'],
            'fecha_id' => ['required'],
            'identificacion' => ['required'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'fecha_nacimiento' => ['required', 'date_format:Y-m-d'],
            'direccion' => ['required', 'min:3'],
            'telefono' => ['required', 'min:3'],
            'email' => ['required', 'email', 'min:3'],
            'cant_aventureros' => ['required', 'integer'],
            'monto_total' => ['required'],
        ]);
        
        $attributes['codigo'] = $codigo;


        Reserva::create($attributes);
        

        //return view('thanks', ['codigo' => $codigo]); 
        //return redirect('/checkout/thanks', ['codigo' => $codigo]); 
        return redirect('/checkout/thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        return view('reservas.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        // $fecha = Fecha::findOrFail($id); pasar otras fechas
        $localidades = Localidad::all();
        $metodos = Metodo::all(); 

        return view('reservas.edit', compact('reserva', 'localidades', 'metodos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {

        $attributes = request()->validate([
            'metodo_pago_id' => ['required'],
            'fecha_id' => ['required'],
            'identificacion' => ['required'],
            'nombre' => ['required'],
            'apellido' => ['required'],
            'fecha_nacimiento' => ['required', 'date_format:Y-m-d'],
            'direccion' => ['required', 'min:3'],
            'telefono' => ['required', 'min:3'],
            'email' => ['required', 'email', 'min:3'],
            'cant_aventureros' => ['required', 'integer'],
            'monto_total' => ['required'],
        ]);

        
        $reserva->update($attributes);



        return redirect('/pdc/reservas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();


        return redirect('/pdc/reservas');
    }
}
