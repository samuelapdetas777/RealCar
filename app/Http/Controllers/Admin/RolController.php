<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


//agregamos

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RolController extends Controller
{
    public function __construct(){
        // $this->middleware('permission:ver-rol | crear-rol | editar-rol | borrar-rol', ['only'=>['index']]);
        $this->middleware('permission:ver-rol', ['only'=>['index']]);
        $this->middleware('permission:crear-rol', ['only'=>['create', 'store']]);
        $this->middleware('permission:editar-rol', ['only'=>['edit', 'update']]);
        $this->middleware('permission:borrar-rol', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::All();
        return view('Admin.roles.rolesindex', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permisos = Permission::get();
        $permisos = Permission::All();
        return view('Admin.roles.agregarrol', compact('permisos'));
        echo "hola";
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
            'nombre' => 'required | min:3 | unique:roles,name',
            'permission' => 'required'
        ]);

        $rol = Role::create(['name' => $request->input('nombre')]);
        foreach($request->permission as $permisos)
        {
            
            $rol->syncPermissions([$request->input('permission')]);
        }
        return redirect('/admin/roles')->with('agregar', 'ok');
        
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
        $rol = Role::find($id);
        if(empty($rol)){
            $e = 1;
            $roles = Role::All();
            return view('Admin.roles.rolesindex', compact('roles', 'e'));
        }else{
            $permisos = Permission::get();
            $rolesPermisos = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)->get();
            return view('Admin.roles.editarrol', compact('permisos', 'rol', 'rolesPermisos'));
        }
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
            'nombre' => 'required | min:3',
            'nombre' => Rule::unique('roles', 'name')->ignore($id),
            'permission' => 'required'
        ]);

        $rol = Role::find($id);
        $rol->name = $request->input('nombre'); 
        foreach($request->permission as $permisos)
        {
            
            $rol->syncPermissions([$request->input('permission')]);
        }
        $rol->save();

        return redirect('/admin/roles')->with('actualizar', 'ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rol = Role::find($id);
        $rol->delete();
        return redirect('/admin/roles')->with('eliminar', 'ok');
    }
}
