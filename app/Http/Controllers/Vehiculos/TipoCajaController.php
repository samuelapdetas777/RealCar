<?php

namespace App\Http\Controllers\Vehiculos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoCaja;

class TipoCajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = TipoCaja::All();
        return view('supportinfo.tipocaja.tipocajaindex', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supportinfo.tipocaja.agregartipocaja');
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
            'nombre' => 'required|min:3|unique:TipoCaja'
        ]);

        $tipocaja = new TipoCaja();
        $tipocaja->nombre = $request->input('nombre');
        $tipocaja->save();
        return redirect('/admin/tipocaja')->with('agregar', 'ok');
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
        $tipocaja = TipoCaja::find($id);
        return view('supportinfo.tipocaja.editartipocaja')->with('tipocaja', $tipocaja);
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
            'nombre' => 'required|min:3|unique:TipoCaja'
        ]);

        $tipocaja = TipoCaja::find($id);
        $tipocaja->nombre = $request->input('nombre');
        $tipocaja->save();
        return redirect('/admin/tipocaja')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipocaja = TipoCaja::find($id);
        $tipocaja->delete();
        return redirect('/admin/tipocaja')->with('eliminar', 'ok');
    }
}
