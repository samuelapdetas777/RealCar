<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:admin-pedido', ['only'=>['index']]);
        $this->middleware('permission:admin-pedidop', ['only'=>['create', 'store']]);
        $this->middleware('permission:admin-pedido', ['only'=>['edit', 'update']]);
        $this->middleware('permission:admin-pedido', ['only'=>['destroy']]);
    }
    public function index()
    {
        $usuarios = User::All();
        $pedidos = Pedido::Where('estado', 1)->get();
        $vehiculos = Vehiculo::All();
        return view('Admin.pedidos.ventasindex', compact('usuarios', 'pedidos', 'vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);
        if(empty($pedido)){
            $e = 1; 
            $usuarios = User::All();
            $pedidos = Pedido::Where('estado', 1)->get();
            $vehiculos = Vehiculo::All();
            return view('Admin.pedidos.ventasindex', compact('usuarios', 'pedidos', 'vehiculos', 'e'));
        }else{
            $proveedores = User::where('id', $pedido->proveedor)->get();
            // echo $proveedor;
            $clientes = User::where('id', $pedido->cliente)->get();
            $vehiculos = Vehiculo::where('id', $pedido->vehiculo)->get();
            return view('Admin.pedidos.verventa', compact('pedido', 'proveedores', 'clientes', 'vehiculos'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
