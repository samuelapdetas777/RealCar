<?php

namespace App\Http\Controllers\Vehiculos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstadoAplicativo;
use App\Models\EstadoVehiculo;
use Illuminate\Auth\Events\Validated;

class EstadoAplicativoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $estados = EstadoAplicativo::All();
        return view('supportinfo.estadoaplicativo.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supportinfo.estadoaplicativo.agregarestado');
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
            'nombre' => 'required|min:3|unique:estadoaplicativo'
        ]);
        $estado = new EstadoAplicativo();
        $estado->nombre = $request->input('nombre');;
        $estado->save();
        return redirect('/estadoaplicativo')->with('agregar', 'ok');
        
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
        $estado = EstadoAplicativo::find($id);
        return view('supportinfo.estadoaplicativo.editarestado')->with('estado', $estado);
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
            'nombre' => 'required|min:3|unique:estadoaplicativo'
        ]);
        $estado =  EstadoAplicativo::find($id);
        $estado->nombre = $request->input('nombre');;
        $estado->save();
        return redirect('/estadoaplicativo')->with('actualizar', 'ok');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = EstadoAplicativo::find($id);
        $estado->delete();
        return redirect('/estadoaplicativo')->with('eliminar', 'ok');
    }
}
