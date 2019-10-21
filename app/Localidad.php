<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table = 'localidades';

    protected $guarded = [];
    

    public function guias() 
    {

    	return $this->hasMany(Guia::class);
    	
    }

    public function provincia()
    {

        return $this->belongsTo('App\Provincia');

    }

     public function zonas() 
    {

        return $this->hasMany(Zona::class);
        
    }
}
