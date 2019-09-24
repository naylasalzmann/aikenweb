<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        $proximas = [
            'Trekking en Los Gigantes',
            'Escalada en Capilla del Monte',
            'Escalada en hielo en El Chaltén'
        ];
        
        return view('welcome')->withProximas($proximas);
    }
    
    
    public function salidas() {
            
        return view('salidas'); 
    }
        
    public function pdc() {
        
        return view('pdc');
    }

    
}
