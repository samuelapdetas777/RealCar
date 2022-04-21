<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    
    public function __construct(){
        // $this->middleware('permission:admin-cita, index| create | store | edit | update | destroy');
        $this->middleware('permission:admin-pedido', ['only'=>['index']]);
        $this->middleware('permission:admin-pedidop', ['only'=>['create', 'store']]);
        $this->middleware('permission:admin-pedido', ['only'=>['edit', 'update']]);
        $this->middleware('permission:admin-pedido', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $usuarios = User::All();
        $pedidos = Pedido::All();
        $vehiculos = Vehiculo::All();
        return view('Admin.pedidos.pedidosindex', compact('usuarios', 'pedidos', 'vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::All();
        $vehiculos = Vehiculo::All();
        return view('Admin.pedidos.agregarpedido', compact('usuarios', 'vehiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required | exists:users,id',
            'vehiculo' => 'required | exists:vehiculos,id',
            'valor' => 'required | integer | numeric | between:1000000,1500000000',
            'fecha' => 'required | date'
        ]);
        $pedido = new Pedido();
        $proveedor = Vehiculo::find($request->input('vehiculo'));  
        // $proveedor = Vehiculo::where('id', '=', $request->input('vehiculo'))->first(); //Otra manera de hacerlo
        $fechaant = $request->input('fecha');
        $año = substr($fechaant, -4);
        $mes = substr($fechaant, 3, 2);
        $dia = substr($fechaant, 0, 2);
        $fecha = $año.'-'.$dia.'-'.$mes;



        $pedido->cliente = $request->input('cliente');
        $pedido->proveedor = $proveedor->user_id;
        $pedido->vehiculo = $request->input('vehiculo');
        $pedido->valor = $request->input('valor');
        $pedido->fechaentrega = $fecha;
        $pedido->save();

        

        return redirect('/admin/pedidos')->with('agregar', 'ok');

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
        $proveedores = User::where('id', '=', $pedido->proveedor)->get();
        // echo $proveedor;
        $clientes = User::where('id', '=', $pedido->cliente)->get();
        $vehiculos = Vehiculo::where('id', '=', $pedido->vehiculo)->get();
        return view('Admin.pedidos.verpedido', compact('pedido', 'proveedores', 'clientes', 'vehiculos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = User::All();
        $pedido = Pedido::find($id);
        $vehiculos = Vehiculo::All();
        $fechaant = $pedido->fechaentrega;
        $mes = substr($fechaant, 5, 2);
        $dia = substr($fechaant, -2);
        $año = substr($fechaant, 0, 4);

        $fecha = $mes.'/'. $dia.'/'. $año;
        return view('Admin.pedidos.editarpedido', compact('usuarios', 'pedido', 'vehiculos', 'fecha'));
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
        $request->validate([
            'cliente' => 'required | exists:users,id',
            'vehiculo' => 'required | exists:vehiculos,id',
            'valor' => 'required | integer | numeric | between:1000000,1500000000',
            'fecha' => 'required | date'
        ]);

        $pedido = Pedido::find($id);
        $proveedor = Vehiculo::find($request->input('vehiculo'));  
        $fechaant = $request->input('fecha');
        $año = substr($fechaant, -4);
        $mes = substr($fechaant, 3, 2);
        $dia = substr($fechaant, 0, 2);
        $fecha = $año.'-'.$dia.'-'.$mes;


        $pedido->cliente = $request->input('cliente');
        $pedido->proveedor = $proveedor->user_id;
        $pedido->vehiculo = $request->input('vehiculo');
        $pedido->valor = $request->input('valor');
        $pedido->fechaentrega = $fecha;
        $pedido->save();

        return redirect('/admin/pedidos')->with('actualizar', 'ok');
        
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
