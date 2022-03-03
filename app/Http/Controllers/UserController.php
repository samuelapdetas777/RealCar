<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Ciudad;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

  
    
       $users =User::paginate(5);
    
        return view('admin.list_users', compact('users'));
    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $ciudades =Ciudad::all();
        // return view('auth.register', $ciudades);
        return view ('auth.register', compact('ciudades'));
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
            'name' => 'required | regex:/^[A-Za-z]+$/',
            'last_name' => 'required | regex:/^[A-Za-z]+$/',
            'document'=> 'required | numeric | digits:10 | unique:users',
            'phone'=> 'required | numeric | digits:10 | unique:users',
            'email' => 'required | email | unique:users',
            'password'=> 'required | regex:/^[A-Za-z0-9]+$/',
            'contrasena_confirmation'=> 'required',
            'address' => 'required',
         
        ]);
        // return $request->input('nombre');


        //$user = User::create($request->except('_token'));
        $user = new User ($request->except('_token'));
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->document = $request->input('document');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password =  bcrypt($request->input('password'));
        $user->address = $request->input('address');
        $user->ciudades_id = $request->input('ciudades_id');

        $user->save();
        return redirect('login');

        // return "joliiiiiiiii";
        
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
