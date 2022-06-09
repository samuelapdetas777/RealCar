<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Ciudad;
use App\Models\Sede;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UUsuarioController extends Controller
{
    
    public function __construct(){
        // $this->middleware('permission:admin-cita, index| create | store | edit | update | destroy');
        $this->middleware('permission:ver-perfil', ['only'=>['show']]);
        $this->middleware('permission:editar-perfil', ['only'=>['edit', 'update']]);
        $this->middleware('permission:p-ver-citas|c-ver-citas', ['only'=>['verCitas', 'mostrarCitasAgendadas']]);
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


    public function verCitas(){
        return view('Landing.vehiculos.citas');
    }

    public function mostrarCitasAgendadas(){
        $id = auth()->user()->id;
        $citas = DB::table('citas')
        ->join('sedes as s', 's.id', 'citas.sedes_id')
        ->select(DB::raw('citas.fecha as start , citas.hora, citas.asunto as title, citas.id, citas.comentario, s.nombre as sede'))
        ->get();
        // $citas = DB::select('SELECT c.fecha AS start , c.hora, c.asunto AS title, c.id, c.comentario, s.nombre AS sede FROM citas AS c JOIN sedes AS s ON c.sedes_id = s.id WHERE c.estado = 1 AND (c.idproveedor = '.$id.' OR c.idcliente = '.$id.')');
        return response()->json($citas);
    }

    public function verCita($id){
        $cita = Cita::find($id);
        $proveedores = User::where('id', $cita->idproveedor)->get();
        $vendedores = User::where('id', $cita->idvendedor)->get();
        $clientes = User::where('id', $cita->idcliente)->get();
        $vehiculos = Vehiculo::where('id', $cita->idvehiculo)->get();
        $sedes = Sede::where('id', $cita->sedes_id)->get();


        return view('Landing.vehiculos.vercita', compact('cita', 'proveedores', 'vendedores', 'clientes', 'vehiculos', 'sedes'));
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
