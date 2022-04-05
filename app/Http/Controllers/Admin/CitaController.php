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
            'vehiculo' => 'exists:vehiculos,id',
            'proveedor' => 'exists:users,id',
            'cliente' => 'exists:users,id',
            'vendedor' => 'exists:users,id',
            'fecha' => 'required',
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
        $cita->sedes_id = $request->input('sede');
        $cita->comentario = $request->input('comentario');

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
        //
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
