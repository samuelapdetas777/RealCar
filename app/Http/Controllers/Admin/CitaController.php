<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use App\Models\Cita;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::All();
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
        $pusuarios = User::All();
        $cusuarios = User::All();
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
        $proveedores = User::where('id', $cita->idproveedor)->get();
        $vendedores = User::where('id', $cita->idvendedor)->get();
        $clientes = User::where('id', $cita->idcliente)->get();
        $vehiculos = Vehiculo::where('id', $cita->idvehiculo)->get();
        $sedes = Sede::where('id', $cita->sedes_id)->get();

        return view('Admin.citas.vercita', compact('cita', 'proveedores', 'vendedores', 'clientes', 'vehiculos', 'sedes'));

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
        $vehiculos = Vehiculo::All();
        $pusuarios = User::All();
        $cusuarios = User::All();
        $vusuarios = User::All();
        $sedes = Sede::All();
        return view('Admin.citas.editarcita', compact( 'cita', 'vehiculos', 'pusuarios', 'cusuarios', 'vusuarios', 'sedes'));
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
        $cita->save();
        // echo $request->input('hora');

        return redirect('/admin/citas')->with('actualizar', 'ok');
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
