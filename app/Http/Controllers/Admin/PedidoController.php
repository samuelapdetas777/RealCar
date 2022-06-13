<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

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
        $pedidos = Pedido::Where('estado', 0)->get();
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
        $pusuarios = User::join('model_has_roles', 'model_has_roles.model_id', 'users.id')->where('model_has_roles.role_id', 9857096)->select('*')->get();
        $cusuarios = User::join('model_has_roles', 'model_has_roles.model_id', 'users.id')->where('model_has_roles.role_id', 9857095)->select('*')->get();
        $vehiculos = Vehiculo::Where('estadoaplicativo_id', 3)->get();
        return view('Admin.pedidos.agregarpedido', compact('pusuarios', 'cusuarios', 'vehiculos'));
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
        $vehiculo = Vehiculo::find($request->input('vehiculo'));  
        // $proveedor = Vehiculo::where('id', '=', $request->input('vehiculo'))->first(); //Otra manera de hacerlo
        $fechaant = $request->input('fecha');
        $año = substr($fechaant, -4);
        $mes = substr($fechaant, 3, 2);
        $dia = substr($fechaant, 0, 2);
        $fecha = $año.'-'.$dia.'-'.$mes;



        $pedido->cliente = $request->input('cliente');
        $pedido->proveedor = $vehiculo->user_id;
        $pedido->vehiculo = $request->input('vehiculo');
        $pedido->valor = $request->input('valor');
        $pedido->fechaentrega = $fecha;
        $vehiculo->estadoaplicativo_id = 5;
        $vehiculo->save();
        $pedido->save();

        // $vehiculo->user_id = $request->input('cliente');
        // $vehiculo->estadoaplicativo_id = 4;

        // $vehiculo->save();

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
        if(empty($pedido)){
            $e = 1; 
            $usuarios = User::All();
            $pedidos =  Pedido::Where('estado', 0)->get();
            $vehiculos = Vehiculo::All();
            return view('Admin.pedidos.pedidosindex', compact('usuarios', 'pedidos', 'vehiculos', 'e'));
        }else{
            $proveedores = User::where('id', '=', $pedido->proveedor)->get();
            // echo $proveedor;
            $clientes = User::where('id', '=', $pedido->cliente)->get();
            $vehiculos = Vehiculo::where('id', '=', $pedido->vehiculo)->get();
            return view('Admin.pedidos.verpedido', compact('pedido', 'proveedores', 'clientes', 'vehiculos'));
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
        $pedido = Pedido::find($id);
        if(empty($pedido)){
            $e = 1;
            $usuarios = User::All();
            $pedidos = Pedido::Where('estado', 0)->get();
            $vehiculos = Vehiculo::All();
            return view('Admin.pedidos.pedidosindex', compact('usuarios', 'pedidos', 'vehiculos', 'e'));
        }elseif($pedido->estado == 1){
            $e = 2;
            $usuarios = User::All();
            $pedidos = Pedido::Where('estado', 0)->get();
            $vehiculos = Vehiculo::All();
            return view('Admin.pedidos.pedidosindex', compact('usuarios', 'pedidos', 'vehiculos', 'e'));
        }
        else{
            $pedido = Pedido::find($id);
            $vehiculos = Vehiculo::All();
            $fechaant = $pedido->fechaentrega;
            $mes = substr($fechaant, 5, 2);
            $dia = substr($fechaant, -2);
            $año = substr($fechaant, 0, 4);

            $fecha = $mes.'/'. $dia.'/'. $año;
            return view('Admin.pedidos.editarpedido', compact('pedido', 'vehiculos', 'fecha'));
        }
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
            'valor' => 'required | integer | numeric | between:1000000,1500000000',
            'fecha' => 'required | date',
            'estado' => 'boolean'
        ]);

        $pedido = Pedido::find($id);
        $vehiculo = Vehiculo::find($pedido->vehiculo);
        $fechaant = $request->input('fecha');
        $año = substr($fechaant, -4);
        $mes = substr($fechaant, 3, 2);
        $dia = substr($fechaant, 0, 2);
        $fecha = $año.'-'.$dia.'-'.$mes;


        // $pedido->proveedor = $vehiculo->user_id;
        // $pedido->vehiculo = $request->input('vehiculo');
        $pedido->valor = $request->input('valor');
        $pedido->fechaentrega = $fecha;
        if($request->input('estado') == 1){
            $pedido->estado = 1;

            $vehiculo->user_id = $pedido->cliente;
            $vehiculo->estadoaplicativo_id = 4;

            $vehiculo->save();
        }
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
        $pedido = Pedido::find($id);
        if(empty($pedido)){
            $e = 1;
            $usuarios = User::All();
            $pedidos = Pedido::Where('estado', 0)->get();
            $vehiculos = Vehiculo::All();
            return view('Admin.pedidos.pedidosindex', compact('usuarios', 'pedidos', 'vehiculos', 'e'));
        }elseif($pedido->estado == 1){
            $e = 3;
            $usuarios = User::All();
            $pedidos = Pedido::Where('estado', 0)->get();
            $vehiculos = Vehiculo::All();
            return view('Admin.pedidos.pedidosindex', compact('usuarios', 'pedidos', 'vehiculos', 'e'));
        }else{
            $pedido->delete();
            return redirect('/admin/pedidos')->with('eliminar', 'ok');
        }
    }

    public function reporte(Request $request){
        if (!empty($request->fechainicio) && !empty($request->fechafin)) {
            $fi = strval($request->fechainicio);
            $ff = strval($request->fechafin);
            // $usuarioscant = DB::select('SELECT COUNT(id) as cant FROM `users` WHERE created_at BETWEEN "'.$fi.'" AND "'.$ff.'"');
            $usuarioscant = User::whereBetween('created_at', [$fi, $ff]);
            
            // return view('Admin.usuarios.pdf', compact('usuarioscant', 'ff'));
            
        }else{
            $pedidoscant = Pedido::where('estado', 0)->count();

            $proveedoresmaspedidos = DB::table('pedidos')->join('users', 'pedidos.proveedor', '=', 'users.id' )->join('model_has_roles', 'model_has_roles.model_id', 'users.id')->select('users.name','users.last_name','users.id', 'pedidos.estado', DB::raw('count(*) as total'))->where('model_has_roles.role_id', 9857096)->where('pedidos.estado', 0)->groupBy('users.name','users.last_name','users.id', 'pedidos.estado')->orderBy('total', 'ASC')->get();

            $clientesmaspedidos = DB::table('pedidos')->join('users', 'pedidos.cliente', '=', 'users.id' )->join('model_has_roles', 'model_has_roles.model_id', 'users.id')->select('users.name','users.last_name','users.id', 'pedidos.estado', DB::raw('count(*) as total'))->where('model_has_roles.role_id', 9857095)->where('pedidos.estado', 0)->groupBy('users.name','users.last_name','users.id', 'pedidos.estado')->orderBy('total', 'ASC')->get();
            
            $ciudadesmaspedidos = DB::table('pedidos')->join('users', 'pedidos.cliente', '=', 'users.id' )->join('ciudades', 'users.city_id', 'ciudades.id')->select('ciudades.nombre','pedidos.estado', DB::raw('count(*) as total'))->where('pedidos.estado', 0)->groupBy('ciudades.nombre','pedidos.estado')->orderBy('total', 'ASC')->get();

            $marcasmassolicitadas = DB::table('pedidos')->join('vehiculos', 'pedidos.vehiculo', '=', 'vehiculos.id' )->join('marcas', 'vehiculos.marcas_id', 'marcas.id')->select('marcas.nombre','pedidos.estado', DB::raw('count(*) as total'))->where('pedidos.estado', 0)->groupBy('marcas.nombre','pedidos.estado')->orderBy('total', 'ASC')->get();
            
            $pdf = PDF::loadView('Admin.pedidos.pedidopdf', ['pedidososcant'=>$pedidoscant, 'clientesmaspedidos'=>$clientesmaspedidos, 'proveedoresmaspedidos'=>$proveedoresmaspedidos, 'ciudadesmaspedidos'=>$ciudadesmaspedidos, 'marcasmassolicitadas'=>$marcasmassolicitadas]);
            
            return $pdf->stream();
            // return view('Admin.usuarios.pdf', compact('usuarioscant', 'usuarioscanthab', 'usuarioscantinhab', 'pusuarios', 'cusuarios', 'ausuarios', 'usuariosxciudad'));
        }
    }

}
