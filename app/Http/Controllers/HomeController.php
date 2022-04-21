<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('permission:admin-home', ['only'=>['index']]);
        $this->middleware('permission:p-home|c-home', ['only'=>['usuarioIndex']]);


        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Admin.home');
    }
    public function usuarioIndex(){
        return view('Landing.home');
    }
}
