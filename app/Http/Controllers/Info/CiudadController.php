<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ciudad;

class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = Ciudad::All();
        return view('supportinfo.ciudad.ciudadindex', compact('ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supportinfo.ciudad.agregarciudad');
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
            'nombre' => 'required | string | min:3 | unique:Ciudades'
        ]);

        $ciudad = new Ciudad();
        $ciudad->nombre = $request->input('nombre');
        $ciudad->save();
        return redirect('/admin/ciudad')->with('agregar', 'ok');
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
        $ciudad = Ciudad::find($id);
        return view('supportinfo.ciudad.editarciudad')->with('ciudad', $ciudad);
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
            'nombre' => 'required | string | min:3 | unique:Ciudades'
        ]);

        $ciudad = Ciudad::find($id);
        $ciudad->nombre = $request->input('nombre');
        $ciudad->save();
        return redirect('/admin/ciudad')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $ciudad = Ciudad::find($id);
        $ciudad->delete();
        return redirect('/admin/ciudad')->with('eliminar', 'ok');
    }
}
