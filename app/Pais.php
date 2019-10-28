<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
	protected $table = 'paises';

    public function provincias() {

    	return $this->hasMany(Provincia::class);
    }

    public function consultas() {

    	return $this->hasMany(Consulta::class);
    }
}
