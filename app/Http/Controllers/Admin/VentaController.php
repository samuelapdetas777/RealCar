<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

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

    public function reporte(Request $request){
        if (!empty($request->fechainicio) && !empty($request->fechafin)) {
            $fi = strval($request->fechainicio);
            $ff = strval($request->fechafin);
            // $usuarioscant = DB::select('SELECT COUNT(id) as cant FROM `users` WHERE created_at BETWEEN "'.$fi.'" AND "'.$ff.'"');
            $usuarioscant = User::whereBetween('created_at', [$fi, $ff]);
            
            // return view('Admin.usuarios.pdf', compact('usuarioscant', 'ff'));
            
        }else{
            $ventascant = Pedido::where('estado', 1)->count();

            $proveedoresmasventas = DB::table('pedidos')->join('users', 'pedidos.proveedor', '=', 'users.id' )->join('model_has_roles', 'model_has_roles.model_id', 'users.id')->select('users.name','users.last_name','users.id', 'pedidos.estado', DB::raw('count(*) as total'))->where('model_has_roles.role_id', 9857096)->where('pedidos.estado', 1)->groupBy('users.name','users.last_name','users.id', 'pedidos.estado')->orderBy('total', 'ASC')->get();

            $clientesmasventas = DB::table('pedidos')->join('users', 'pedidos.cliente', '=', 'users.id' )->join('model_has_roles', 'model_has_roles.model_id', 'users.id')->select('users.name','users.last_name','users.id', 'pedidos.estado', DB::raw('count(*) as total'))->where('model_has_roles.role_id', 9857095)->where('pedidos.estado', 1)->groupBy('users.name','users.last_name','users.id', 'pedidos.estado')->orderBy('total', 'ASC')->get();
            
            $ciudadesmasventas = DB::table('pedidos')->join('users', 'pedidos.cliente', '=', 'users.id' )->join('ciudades', 'users.city_id', 'ciudades.id')->select('ciudades.nombre','pedidos.estado', DB::raw('count(*) as total'))->where('pedidos.estado', 1)->groupBy('ciudades.nombre','pedidos.estado')->orderBy('total', 'ASC')->get();

            $marcasmasvendidas = DB::table('pedidos')->join('vehiculos', 'pedidos.vehiculo', '=', 'vehiculos.id' )->join('marcas', 'vehiculos.marcas_id', 'marcas.id')->select('marcas.nombre','pedidos.estado', DB::raw('count(*) as total'))->where('pedidos.estado', 1)->groupBy('marcas.nombre','pedidos.estado')->orderBy('total', 'ASC')->get();
            
            $pdf = PDF::loadView('Admin.pedidos.ventapdf', ['ventascant'=>$ventascant, 'clientesmasventas'=>$clientesmasventas, 'proveedoresmasventas'=>$proveedoresmasventas, 'ciudadesmasventas'=>$ciudadesmasventas, 'marcasmasvendidas'=>$marcasmasvendidas]);
            
            return $pdf->stream();
            // return view('Admin.usuarios.pdf', compact('usuarioscant', 'usuarioscanthab', 'usuarioscantinhab', 'pusuarios', 'cusuarios', 'ausuarios', 'usuariosxciudad'));
        }
    }
}
