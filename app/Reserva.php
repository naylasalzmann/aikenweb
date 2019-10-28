<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $guarded = [];
    
    public function estado()
    {

    	return $this->belongsTo(Estado::class);	

    }

    public function metodo()
    {

    	return $this->belongsTo(Metodo::class, 'metodo_pago_id');	

    }

    public function fecha()
    {

    	return $this->belongsTo(Fecha::class);	

    }

    public function confirmacion()
    {
        return $this->hasOne(Confirmacion::class);
    }

    public function salida()
    {
        return $this->hasOneThrough(Salida::class, Fecha::class);
    }
}
