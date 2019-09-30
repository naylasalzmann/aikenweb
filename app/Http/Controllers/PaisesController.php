<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pais;


class PaisesController extends Controller
{
    public function index()
    {
        $paises = Pais::all();
        dd($paises);

        return view('welcome', compact('paises'));
    }
}
