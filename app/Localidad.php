<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table = 'localidades';

    public function guias() 
    {

    	return $this->hasMany(Guia::class);
    	
    }
}
