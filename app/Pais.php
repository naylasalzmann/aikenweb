<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    public function provincias() {

    	return $this->hasMany(Provincia::class);
    }
}
