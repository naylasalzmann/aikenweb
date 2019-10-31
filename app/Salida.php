<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $guarded = [];

    public function guias()
    {

        return $this->belongsToMany('App\Guia');

    }

    public function fechas()
    {

    	return $this->hasMany(Fecha::class);	

    }

    public function condicion()
    {

    	return $this->belongsTo(Condicion::class);	

    }

    public function tipo()
    {

    	return $this->belongsTo(TipoSalida::class);	

    }

    public function zona()
    {

    	return $this->belongsTo(Zona::class);	

    }

    public function consultas()
    {

        return $this->hasMany(Consulta::class);    

    }

    public function reservas()
    {

        return $this->hasManyThrough(Reserva::class, Fecha::class);

    }

    public function addFecha($fecha)
    {

    	$this->fechas()->create($fecha);	

    }

}
