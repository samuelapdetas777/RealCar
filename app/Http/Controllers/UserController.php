<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Ciudad;
use App\Models\Rol;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //    $users =User::paginate(5);
    
    //     return view('admin.list_users', compact('users'));
    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $ciudades =Ciudad::All();
        // $ciudades = DB::table('ciudades')->where('nombre', '<>', 'prueba3')->get();
        $roles = Role::Where('name', '<>', 'Administrador')->orWhere('name', '<>', 'Admin')->get();
        return view ('auth.register', compact('ciudades', 'roles'));
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
            'nombre' => 'required | regex:/^[A-Za-z]+$/',
            'apellido' => 'required | regex:/^[A-Za-z]+$/',
            'documento'=> 'required | numeric | digits:10',
            'celular'=> 'required | numeric | digits:10',
            'email' => 'required | email | unique:users',
            'password'=> 'required | regex:/^[A-Za-z0-9]+$/',
            'confirmacion_password'=> 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            //'roles' => 'required',

         
        ]);
        // return $request->input('nombre');


        //$user = User::create($request->except('_token'));
        $user = new User ($request->except('_token'));
        $user->name = $request->input('nombre');
        $user->last_name = $request->input('apellido');
        $user->document = $request->input('documento');
        $user->phone = $request->input('celular');
        $user->email = $request->input('email');
        $user->password =  bcrypt($request->input('password'));
        $user->address = $request->input('direccion');
        $user->city_id = $request->input('ciudad');
        // $user->role_id = $request->input('rol');

        $user->save();
        $user->assignRole($request->input('roles'));
        return redirect('/login');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit_users')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name = $request->nombre;
        $user->last_name = $request->apellido;
        $user->document = $request->documento;
        $user->phone = $request->celular;
        $user->email = $request->correo;
        $user->address = $request->direccion;
        

        $user->save();
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin');
    }
}
