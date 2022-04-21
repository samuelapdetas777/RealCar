<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CCitaController extends Controller
{
    
    public function __construct(){
        // $this->middleware('permission:admin-cita, index| create | store | edit | update | destroy');
        $this->middleware('permission:admin-tipocaja', ['only'=>['index']]);
        $this->middleware('permission:admin-tipocaja', ['only'=>['create', 'store']]);
        $this->middleware('permission:admin-tipocaja', ['only'=>['edit', 'update']]);
        $this->middleware('permission:admin-tipocaja', ['only'=>['destroy']]);
    }
}
