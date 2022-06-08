<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UUsuarioController extends Controller
{
    
    public function __construct(){
        // $this->middleware('permission:admin-cita, index| create | store | edit | update | destroy');
        $this->middleware('permission:ver-perfil', ['only'=>['show']]);
        $this->middleware('permission:editar-perfil', ['only'=>['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * 
     */
    public function show()
    {
        
        $id = Auth::user()->id;

        $usuario = user::find($id);
        $ciudades = Ciudad::All();
        $roles = Role::All();
        return view('Landing.usuarios.verperfil', compact('usuario', 'ciudades', 'roles'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = auth()->user()->id;
        $usuario = User::find($id);
        $ciudades = Ciudad::All();
        return view('Landing.usuarios.editarperfil', compact('usuario', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        

        $request->validate=([
            'nombre' => 'required | regex:/^[A-Za-z]+$/',
            'apellido' => 'required | regex:/^[A-Za-z]+$/',
            'documento'=> 'required | numeric | digits:10', //unico
            'celular'=> 'required | numeric | digits:10',   //unico
            'email' => 'required | email | unique:users',   //unico
            'ciudad' => 'required',
            'direccion' => 'required',
        ]);




        $id = auth()->user()->id;

        // $usuario = new User ($request->except('_token'));
        $usuario = User::find($id);
        $usuario->name = $request->input('nombre');
        $usuario->last_name = $request->input('apellido');
        $usuario->document = $request->input('documento');
        $usuario->phone = $request->input('celular');
        $usuario->email = $request->input('email');
        $usuario->city_id = $request->input('ciudad');
        $usuario->address = $request->input('direccion');



        if ($request->hasFile('imagen')) {
            if ($usuario->photo !=null) {
                $usuario->photo->delete();
            }


            $input = $request->All();
            $imagen = $request->file('imagen');
    
    
            $rutaGuardarImagen = 'imagen/';
            $imagenProducto = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImagen, $imagenProducto);
            // $input['imagen'] = "$imagenProducto";
            $usuario->photo = "$imagenProducto";
        }



        $usuario->save();

        $input = $request->All();

        
        $rol =  Role::join('model_has_roles', 'model_has_roles.role_id', 'roles.id')->where('model_has_roles.model_id', $id)->select('roles.name')->get();
        if($rol == "Cliente"){
            return redirect('/catalogo')->with('edicionperfil', 'ok');
        }else if($rol == "Proveedor"){
            return redirect('/vehiculos/index')->with('edicionperfil', 'ok');
        }else{
            return redirect('/admin/home')->with('edicionperfil', 'ok');
        }
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
