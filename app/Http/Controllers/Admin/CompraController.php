<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    
    public function __construct(){
        // $this->middleware('permission:admin-cita, index| create | store | edit | update | destroy');
        $this->middleware('permission:admin-compra', ['only'=>['index']]);
        $this->middleware('permission:admin-compra', ['only'=>['create', 'store']]);
        $this->middleware('permission:admin-compra', ['only'=>['edit', 'update']]);
        $this->middleware('permission:admin-compra', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compra::All();
        $usuarios = User::All();
        $vehiculos = Vehiculo::All();
        return view('Admin.compras.comprasindex', compact('compras', 'usuarios', 'vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = Vehiculo::where('estadoaplicativo_id', 3)->get();
        return view ('Admin.compras.agregarcompra')->with('vehiculos', $vehiculos);
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
            'vehiculo' => 'required  | exists:vehiculos,id',
            'valor' => 'required | integer | numeric | between:1000000,1500000000',
        ]);
        
        $compra = new Compra();
        $vehiculo = Vehiculo::find($request->input('vehiculo'));

        $compra->proveedor = $vehiculo->user_id;
        $compra->vehiculo = $request->input('vehiculo');
        $compra->valor = $request->input('valor');
        $compra->save();

        $vehiculo->user_id = 8;
        $vehiculo->save();
        
        return redirect('/admin/compras')->with('agregar', 'ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra = Compra::find($id);
        if(empty($compra)){
            $e = 1;
            $compras = Compra::All();
            $usuarios = User::All();
            $vehiculos = Vehiculo::All();
            return view('Admin.compras.comprasindex', compact('compras', 'usuarios', 'vehiculos', 'e'));
        }else{
            $proveedores = User::where('id', '=', $compra->proveedor)->get();
            $vehiculos = Vehiculo::where('id', '=', $compra->vehiculo)->get();
            return view('Admin.compras.vercompra', compact('compra', 'proveedores', 'vehiculos'));
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
            $comprascant = Compra::count();
            $usuarioscanthab = User::where('state',1)->count();
            $usuarioscantinhab = User::where('state',0)->count();
            
            $vehiculosmascomprados = DB::table('compras')->join('vehiculos', 'compras.vehiculo', '=', 'vehiculos.id' )->join('marcas', 'vehiculos.marcas_id', '=', 'marcas.id' )->select('marcas.nombre', DB::raw('count(*) as total'))->groupBy('marcas.nombre')->orderBy('total', 'ASC')->get();
            $proveedoresmascomprados = DB::table('compras')->join('users', 'compras.proveedor', '=', 'users.id' )->select('users.id', 'users.name', DB::raw('count(*) as total'))->groupBy('users.id','users.name')->orderBy('total', 'ASC')->get();
            
            $pdf = PDF::loadView('Admin.compras.pdf', ['comprascant'=>$comprascant, 'usuarioscanthab'=>$usuarioscanthab, 'usuarioscantinhab'=>$usuarioscantinhab, 'vehiculosmascomprados'=> $vehiculosmascomprados, 'proveedoresmascomprados'=>$proveedoresmascomprados]);
            
            return $pdf->stream();
            // return view('Admin.usuarios.pdf', compact('usuarioscant', 'usuarioscanthab', 'usuarioscantinhab', 'pusuarios', 'cusuarios', 'ausuarios', 'usuariosxciudad'));
        }
    }
    
}
