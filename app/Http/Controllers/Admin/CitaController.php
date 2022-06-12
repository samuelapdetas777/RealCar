<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use App\Models\Cita;
use App\Models\Sede;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    public function __construct(){
        // $this->middleware('permission:admin-cita, index| create | store | edit | update | destroy');
        $this->middleware('permission:admin-cita', ['only'=>['index']]);
        $this->middleware('permission:admin-cita', ['only'=>['create', 'store']]);
        $this->middleware('permission:admin-cita', ['only'=>['edit', 'update']]);
        $this->middleware('permission:admin-cita', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::where('estado', 0)->get();
        return view('Admin.citas.citasindex', compact('citas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = Vehiculo::All();
        $pusuarios = User::join('model_has_roles', 'model_has_roles.model_id', 'users.id')->where('model_has_roles.role_id', 9857096)->select('*')->get();
        $cusuarios = User::join('model_has_roles', 'model_has_roles.model_id', 'users.id')->where('model_has_roles.role_id', 9857095)->select('*')->get();
        $vusuarios = User::All();
        $sedes = Sede::All();
        return view('Admin.citas.agregarcita', compact('vehiculos', 'pusuarios', 'cusuarios', 'vusuarios', 'sedes'));
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
            'asunto' => 'required | string | min:5',
            'vehiculo' => 'nullable | exists:vehiculos,id',
            'proveedor' => 'nullable | exists:users,id',
            'cliente' => 'nullable | exists:users,id',
            'vendedor' => 'nullable | exists:users,id',
            'fecha' => 'required | date',
            'hora' => 'required | date_format:H:i',
            'sede' => 'required | exists:sedes,id',
            'comentario' => 'min:4',

        ]);

        $cita = new Cita();
        $cita->asunto = $request->input('asunto');
        $cita->idvehiculo = $request->input('vehiculo');
        $cita->idproveedor = $request->input('proveedor');
        $cita->idcliente = $request->input('cliente');
        $cita->idvendedor = $request->input('vendedor');
        $cita->fecha = $request->input('fecha');
        $cita->hora = $request->input('hora');
        $cita->sedes_id = $request->input('sede');
        $cita->comentario = $request->input('comentario');
        $cita->estado = 0;
        $cita->save();

        return redirect('/admin/citas')->with('agregar', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cita = Cita::find($id);
        if(empty($cita)){
            $e = 1;
            return view('Admin.citas.citasagendadas', compact('e'));
        }else{
            $proveedores = User::where('id', $cita->idproveedor)->get();
            $vendedores = User::where('id', $cita->idvendedor)->get();
            $clientes = User::where('id', $cita->idcliente)->get();
            $vehiculos = Vehiculo::where('id', $cita->idvehiculo)->get();
            $sedes = Sede::where('id', $cita->sedes_id)->get();

            return view('Admin.citas.vercita', compact('cita', 'proveedores', 'vendedores', 'clientes', 'vehiculos', 'sedes'));
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
        $cita = Cita::find($id);
        if(empty($cita)){
            $e = 1;
            return view('Admin.citas.citasagendadas', compact('e'));
        }else{

            $citasfecha = Cita::where('fecha', $cita->fecha)->where('sedes_id', $cita->sedes_id)->Where('id', '<>', $id)->where('estado', 1)->get();
            $vehiculos = Vehiculo::All();
            $pusuarios = User::join('model_has_roles', 'model_has_roles.model_id', 'users.id')->where('model_has_roles.role_id', 9857096)->select('*')->get();
            $cusuarios = User::join('model_has_roles', 'model_has_roles.model_id', 'users.id')->where('model_has_roles.role_id', 9857095)->select('*')->get();
            $vusuarios = User::All();
            $sedes = Sede::All();
            return view('Admin.citas.editarcita', compact( 'cita', 'citasfecha', 'vehiculos', 'pusuarios', 'cusuarios', 'vusuarios', 'sedes'));
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
            'asunto' => 'required | string | min:5',
            'vehiculo' => 'nullable | exists:vehiculos,id',
            'proveedor' => 'nullable | exists:users,id',
            'cliente' => 'nullable | exists:users,id',
            'vendedor' => 'nullable | exists:users,id',
            'fecha' => 'required | date',
            'hora' => 'required',// | date_format:H:i', 
            'sede' => 'required | exists:sedes,id',
            'comentario' => 'min:4',

        ]);

        $cita = Cita::find($id);
        $cita->asunto = $request->input('asunto');
        $cita->idvehiculo = $request->input('vehiculo');
        $cita->idproveedor = $request->input('proveedor');
        $cita->idcliente = $request->input('cliente');
        $cita->idvendedor = $request->input('vendedor');
        $cita->fecha = $request->input('fecha');
        $cita->hora = $request->input('hora');
        $cita->sedes_id = $request->input('sede');
        $cita->comentario = $request->input('comentario');
        $cita->estado = 1;
        $cita->save();
        // echo $request->input('hora');

        return redirect('/admin/citasagendadas')->with('actualizar', 'ok');
        
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

    public function citasPorFecha(Request $request){
        try{
            
            $fecha = $request->fecha;
            $sede = $request->sede;
            $citasfecha = Cita::where('fecha', $fecha)->where('sedes_id', $sede)->where('estado', 1)->get();
            return response(json_encode($citasfecha),200);

        }catch(Exception $e){
            echo $e;
        }
        
    }

    public function indexCitasAgendadas(){
        return view('Admin.citas.citasagendadas');
        // return response()->json($citas);
    }


    public function mostrarCitasAgendadas(){
        $citas = DB::table('citas')
        ->join('sedes as s', 's.id', 'citas.sedes_id')
        ->select(DB::raw('citas.fecha as start , citas.hora, citas.asunto as title, citas.id, citas.comentario, s.nombre as sede'))
        ->where('citas.estado', 1)
        ->get();
//          $citas =  DB::table('citas')->join('sedes as s', 's.id', 'citas.sedes_id')->select(DB::raw('citas.fecha as start , citas.hora, citas.asunto as title, cita
// s.id, citas.comentario, s.nombre as sede'))->where('estado', 1)->get(); 
        return response()->json($citas);
    }


    public function verCitaModal(Request $request){
        $id = $request->id;
        $citas = Cita::find($id);
        return response(json_encode($citas));
    }

    
}
