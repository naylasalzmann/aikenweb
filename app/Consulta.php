<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    
}
