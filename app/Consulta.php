<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Consulta extends Model
{
    protected $guarded = [];

    public function salida()
    {

    	return $this->belongsTo(Salida::class);	

    }

    public function pais()
    {

    	return $this->belongsTo(Pais::class);	

    }

    public function provincia()
    {

    	return $this->belongsTo(Provincia::class);	

    }

    public function getNombreMes() {
        setlocale(LC_ALL,"es_ES"); 
        Carbon::setLocale('es'); 

        $fecha = Carbon::parse($this->created_at);
        $mes = $fecha->format("F");

        return $mes;
    }
    
}
