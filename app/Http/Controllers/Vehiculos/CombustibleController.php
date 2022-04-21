<?php

namespace App\Http\Controllers\Vehiculos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Combustible;

class CombustibleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:ver-combustible', ['only'=>['index']]);
        $this->middleware('permission:crear-combustible', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-combustible', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-combustible', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combustibles = Combustible::All();
        return view('supportinfo.combustible.combustibleindex', compact('combustibles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supportinfo.combustible.agregarcombustible');
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
            'nombre' => 'required | min:3 | unique:Combustibles'
        ]);

        $combustible = new Combustible();
        $combustible->nombre = $request->input('nombre');
        $combustible->save();
        return redirect('/admin/combustible')->with('agregar', 'ok');
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
        $combustible = Combustible::find($id);
        return view('supportinfo.combustible.editarcombustible')->with('combustible',$combustible);
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
            'nombre' => 'required | min:3 | unique:Combustibles'
        ]);

        $combustible = Combustible::find($id);
        $combustible->nombre = $request->input('nombre');
        $combustible->save();
        return redirect('/admin/combustible')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $combustible = Combustible::find($id);
        $combustible->delete();
        return redirect('/admin/combustible')->with('eliminar', 'ok');
    }
}
