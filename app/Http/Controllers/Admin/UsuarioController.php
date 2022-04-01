<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(8);
        $ciudades = Ciudad::All();
        // $roles = Rol::All();
        // $roles = Role::pluck('name', 'name')->All();
        $roles = Role::All();
        return view('Admin.usuarios.usuarioindex', compact('usuarios', 'ciudades', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudad::All();
        $roles = Role::All();
        // $roles = Role::pluck('name', 'name')->All();
        return view('Admin.usuarios.agregarusuario', compact('ciudades', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate=([
            'nombre' => 'required | regex:/^[A-Za-z]+$/',
            'apellido' => 'required | regex:/^[A-Za-z]+$/',
            'documento'=> 'required | numeric | digits:10', //unico
            'celular'=> 'required | numeric | digits:10',   //unico
            'email' => 'required | email | unique:users',   //unico
            'password'=> 'required | regex:/^[A-Za-z0-9]+$/ | same:confirmacion_de_password',
            // 'email' => 'unique:users,email'
            'confirmacion_de_password'=> 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'rol' => 'required',
            'estado'=> 'required'
        ]);

        $usuario = new User ($request->except('_token'));
        $usuario->name = $request->input('nombre');
        $usuario->last_name = $request->input('apellido');
        $usuario->document = $request->input('documento');
        $usuario->phone = $request->input('celular');
        $usuario->email = $request->input('email');
        $usuario->password =  bcrypt($request->input('password'));
        $usuario->city_id = $request->input('ciudad');
        $usuario->address = $request->input('direccion');
        $usuario->state = $request->input('estado');
        
        $usuario->save();
        $usuario->assignRole($request->input('roles'));



        $input = $request->All();
        
        // $user = User::create($input);





        return redirect('/admin/usuarios')->with('agregar', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = user::find($id);
        $ciudades = Ciudad::All();
        $roles = Role::All();
        return view('Admin.usuarios.verusuario', compact('usuario', 'ciudades', 'roles'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        // $roles = Role::pluck('name', 'name')->All();
        $roles = Role::All();
        $usuario = User::find($id);
        $ciudades = Ciudad::All();
        // $userRol = $usuario->roles->pluck('name', 'name')->All();
        $userRol = $usuario->roles->All();
        return view('Admin.usuarios.editarusuario', compact('usuario', 'ciudades', 'roles', 'userRol'));
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
        // $request->validate=([
        //     'nombre' => 'required | regex:/^[A-Za-z]+$/',
        //     'apellido' => 'required | regex:/^[A-Za-z]+$/',
        //     'documento'=> 'required | numeric | digits:10', //unico
        //     'celular'=> 'required | numeric | digits:10',   //unico
        //     'email' => 'required | email | unique:users',   //unico
        //     'password'=> 'required | regex:/^[A-Za-z0-9]+$/',
        //     'confirmacion_de_password'=> 'required',
        //     'ciudad' => 'required',
        //     'direccion' => 'required',
        //     'rol' => 'required',
        //     'estado'=> 'required'
        // ]);






        $request->validate=([
            'nombre' => 'required | regex:/^[A-Za-z]+$/',
            'apellido' => 'required | regex:/^[A-Za-z]+$/',
            'documento'=> 'required | numeric | digits:10', //unico
            'celular'=> 'required | numeric | digits:10',   //unico
            'email' => 'required | email | unique:users',   //unico
            'password'=> 'required | regex:/^[A-Za-z0-9]+$/',
            // 'email' => 'unique:users,email'
            'confirmacion_de_password'=> 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'roles' => 'required',
            'estado'=> 'required'
        ]);






        // $usuario = new User ($request->except('_token'));
        $usuario = User::find($id);
        $usuario->name = $request->input('nombre');
        $usuario->last_name = $request->input('apellido');
        $usuario->document = $request->input('documento');
        $usuario->phone = $request->input('celular');
        $usuario->email = $request->input('email');
        $usuario->password =  bcrypt($request->input('password'));
        $usuario->city_id = $request->input('ciudad');
        $usuario->address = $request->input('direccion');

        $usuario->state = $request->input('estado');
        $usuario->save();

        $input = $request->All();
        DB::table('model_has_roles')->where('model_id', $id)->delete(); //eliminamos el registro de la tabla detalle que relaciona al usuario con el rol, para que no este asignado a varios roles

        $usuario->assignRole($request->input('roles'));
        return redirect('/admin/usuarios')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/admin/usuarios')->with('eliminar', 'ok');
    }
}
