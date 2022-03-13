<?php

namespace App\Http\Controllers\Vehiculos;

use App\Http\Controllers\Controller;
use App\Models\EstadoVehiculo;
use Illuminate\Http\Request;

class EstadoVehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadosv = EstadoVehiculo::All();
        return view('supportinfo.estadovehiculo.estadovehiculoindex', compact('estadosv'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supportinfo.estadovehiculo.agregarestadovehiculo');
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
            'nombre' => 'required | min:3 | unique:EstadoVehiculo'
        ]);

        $estadovehiculo = new EstadoVehiculo();
        $estadovehiculo->nombre = $request->input('nombre');
        $estadovehiculo->save();
        return redirect('/estadovehiculo')->with('agregar', 'ok');
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
        $estadov = EstadoVehiculo::find($id);
        return view('supportinfo.estadovehiculo.editarestadovehiculo')->with('estadov', $estadov);
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
            'nombre' => 'required | min:3 | unique:EstadoVehiculo'
        ]);

        $estadovehiculo = EstadoVehiculo::find($id);
        $estadovehiculo->nombre = $request->input('nombre');
        $estadovehiculo->save();
        return redirect('/estadovehiculo')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estadov = EstadoVehiculo::find($id);
        $estadov->delete();
        return redirect('/estadovehiculo')->with('eliminar', 'ok');
    }
}
