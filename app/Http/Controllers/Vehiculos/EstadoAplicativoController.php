<?php

namespace App\Http\Controllers\Vehiculos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstadoAplicativo;
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

        $estados = EstadoAplicativo::paginate(5);
        return view('supportinfo.estadoaplicativo.index', compact('estados'));
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
        $request->validate([
            'nombreEstadoAplicativo' => 'required|min:3'
        ]);

        $estado = new EstadoAplicativo();
        $estado->nombre = $request->input('nombreEstadoAplicativo');;

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
        $request->validate([
            'editarNombreEstadoAplicativo' => 'required|min:3'
        ]);
        
        $estado = EstadoAplicativo::find($id);
        $estado->nombre = $request->input('editarNombreEstadoAplicativo');;

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
