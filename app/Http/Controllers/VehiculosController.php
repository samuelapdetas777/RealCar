<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function estadoAplicativo(){
         return view('supportinfo.estadoaplicativo');

        return "adfasdfasdas";
    }
}
