<?php

namespace App\Http\Controllers;

use App\Salida;
use App\Guia;
use App\TipoSalida;
use App\Condicion;
use App\Zona;
use Illuminate\Http\Request;

class SalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $salidas = Salida::all();
        $tipos = TipoSalida::all();
        $zonas = Zona::all();
        $selectedTipo = null;
        $selectedZona = null;


        //return $request->tipo_id;
        if ($request->filled('tipo_id')) {

            $salidas = Salida::where('tipo_id', $request->tipo_id)->get();
            $selectedTipo = TipoSalida::find($request->tipo_id);

        }

        if ($request->filled('zona')) {

            $selectedZona = Zona::where('nombre', $request->zona)->first();

            $salidas = Salida::where('zona_id', $selectedZona->id)->get(); 
        }

        if($request->filled('mes')) {

            $salidas = Salida::whereHas('fechas', function ($query) {
                $query->whereMonth('inicio', request()->mes);
            })->get();
        }


        return view('salidas.index', compact(
                'salidas', 
                'tipos', 
                'zonas', 
                'selectedTipo', 
                'selectedZona'
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = TipoSalida::all();
        $condiciones = Condicion::all();
        $zonas = Zona::all();
        $guias = Guia::all();



        return view('salidas.create', compact('tipos', 'condiciones', 'zonas', 'guias' ));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Salida $salida)
    {

        $attributes = request()->validate([
            'tipo_id' => ['required'],
            'condicion_id' => ['required'],
            'zona_id' => ['required'],
            'titulo' => ['required', 'min:3'],
            'subtitulo' => ['required', 'min:3'],
            'descripcion' => ['required', 'min:3'],
            'cupo_maximo' => ['required', 'integer'],
            'cupo_minimo' => ['required', 'integer'],
            'precio' => ['required', 'numeric'],
        ]);

     

        $sal = Salida::create($attributes);



        $guiasIds = request()->guias;

        $g = json_decode($guiasIds, true);

        $sal->guias()->attach($g);
        

        return redirect('/pdc/salidas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function show(Salida $salida)
    {
        return view('salidas.show', compact('salida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function edit(Salida $salida)
    {
        
        $tipos = TipoSalida::all();
        $condiciones = Condicion::all();
        $zonas = Zona::all();
        $guias = Guia::all();

        return view('salidas.edit', compact('salida', 'tipos', 'condiciones', 'zonas', 'guias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Salida $salida)
    {
        $attributes = request()->validate([
            'tipo_id' => ['required'],
            'condicion_id' => ['required'],
            'zona_id' => ['required'],
            'titulo' => ['required', 'min:3'],
            'subtitulo' => ['required', 'min:3'],
            'descripcion' => ['required', 'min:3'],
            'cupo_maximo' => ['required', 'integer'],
            'cupo_minimo' => ['required', 'integer'],
            'precio' => ['required', 'numeric'],
        ]);


        $salida->update($attributes);

        // si se actualizan los guías, los reemplazo
        if (request()->filled('guias')) {
            $guiasIds = json_decode(request()->guias, true);
            $salida->guias()->sync($guiasIds);
        }



        return redirect('/pdc/salidas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salida  $salida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salida $salida)
    {
        
        $salida->delete();


        return redirect('/pdc/salidas');
    }
}
