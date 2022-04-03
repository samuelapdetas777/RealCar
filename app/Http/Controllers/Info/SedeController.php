<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\Sede;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class SedeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sedes = Sede::All();
        $ciudades = Ciudad::All();
        return view('supportinfo.sedes.sedeindex', compact('sedes', 'ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudad::All();
        return view('supportinfo.sedes.agregarsede')->with('ciudades', $ciudades);
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
            'nombre' => 'required | min:5 | string',
            'telefono' => 'required | numeric | min:10',
            'correo' => 'required | email',
            'direccion' => 'required | min:5',
            'ciudad' => 'required | exists:ciudades,id' 
        ]);
        $sede = new Sede();
        $sede->nombre = $request->input('nombre');
        $sede->telefono = $request->input('telefono');
        $sede->correo = $request->input('correo');
        $sede->direccion = $request->input('direccion');
        $sede->ciudades_id = $request->input('ciudad');
        $sede->save();
        return redirect('/admin/sede')->with('agregar', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudades = Ciudad::All();
        $sede = Sede::find($id);
        return view('supportinfo.sedes.detallesede',compact('ciudades', 'sede'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ciudades = Ciudad::All();
        $sede = Sede::find($id);
        return view('supportinfo.sedes.editarsede', compact('ciudades', 'sede'));
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
            'nombre' => 'required | min:5', 
            'nombre' => Rule::unique('sedes', 'nombre')->ignore($id),  //se usa para no validar que ya este registrado, ignorando el registro que se va a editar
            'telefono' => 'required | min:10',
            'correo' => 'required | email',
            'direccion' => 'required | min:5',
            'ciudad' => 'required'
        ]);
        $sede = Sede::find($id);
        $sede->nombre = $request->input('nombre');
        $sede->telefono = $request->input('telefono');
        $sede->correo = $request->input('correo');
        $sede->direccion = $request->input('direccion');
        $sede->ciudades_id = $request->input('ciudad');
        $sede->save();
        return redirect('/admin/sede')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sede = Sede::find($id);
        $sede->delete();
        return redirect('/admin/sede')->with('eliminar', 'ok');
    }
}
