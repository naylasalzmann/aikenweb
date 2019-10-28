<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    public function localidades() {

    	return $this->hasMany(Localidad::class);
    }

    public function consultas() {

    	return $this->hasMany(Consulta::class);
    }
}
