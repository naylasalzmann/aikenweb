<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


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

    public function getAge() {

        $years = Carbon::parse($this->fecha_nacimiento)->age;


        return $years ? $years : '';
    }

    public function getAcompañantes() {
        $cantidad = $this->cant_aventureros == 1 ? 0 : $this->cant_aventureros - 1;

        return $cantidad;  
    }
}
