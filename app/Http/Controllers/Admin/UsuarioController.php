<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Ciudad;
use App\Models\Combustible;
use App\Models\EstadoAplicativo;
use App\Models\EstadoVehiculo;
use App\Models\Marca;
use App\Models\Rol;
use App\Models\TipoCaja;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    
    public function __construct(){
        // $this->middleware('permission:admin-cita, index| create | store | edit | update | destroy');
        $this->middleware('permission:admin-usuario', ['only'=>['index']]);
        $this->middleware('permission:admin-usuario', ['only'=>['create', 'store']]);
        $this->middleware('permission:admin-usuario', ['only'=>['edit', 'update']]);
        $this->middleware('permission:admin-usuario', ['only'=>['destroy']]);
        $this->middleware('permission:admin-cita', ['only'=>['verCatalogo']]);
        $this->middleware('permission:admin-cita', ['only'=>['verCitas']]);
    }
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
        $request->validate([
            'nombre' => 'required | regex:/^[A-Za-z]+$/ | between:3,15',
            'apellido' => 'required | regex:/^[A-Za-z]+$/ | between:3,15',
            'documento'=> 'required | numeric | digits:10 | unique:users,document', 
            'celular'=> 'required | numeric | digits:10 | unique:users,phone',
            'email' => 'required | email | unique:users,email',
            'password'=> 'required | regex:/^[A-Za-z0-9]+$/ | same:confirmacion_de_password',
            // 'email' => 'unique:users,email'
            'confirmacion_de_password'=> 'required | regex:/^[A-Za-z0-9]+$/ ',
            'ciudad' => 'required | exists:ciudades,id',
            'direccion' => 'required',
            'roles' => 'required | exists:roles,id',
            'estado'=> 'required | boolean'
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

        $request->validate([
            'imagen' => ' image | mimes:jpeg,png,jpg',
            'nombre' => 'required | regex:/^[A-Za-z]+$/ | between:3,15',
            'apellido' => 'required | regex:/^[A-Za-z]+$/ | between:3,15',
            'documento'=> 'required | numeric | digits:10 | unique:users,document', 
            'documento' =>  Rule::unique('users', 'document')->ignore($id),
            'celular'=> 'required | numeric | digits:10 | unique:users,phone',
            'celular' =>  Rule::unique('users', 'phone')->ignore($id),
            'email' => 'required | email | unique:users,email',
            'email' =>  Rule::unique('users', 'email')->ignore($id),
            'ciudad' => 'required | exists:ciudades,id',
            'direccion' => 'required',
            'roles' => 'required | exists:roles,id',
            'estado'=> 'required | boolean'
        ]);



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

        // return $request->file('imagen')->store('public/imagenes/users');



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
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        return redirect('/admin/usuarios')->with('eliminar', 'ok');
    }

    /**
     * 
     * @param int $id
     */
    public function verCatalogo($id){

        $vehiculos = Vehiculo::where('user_id', $id)->Paginate(12);
        $usuarios = User::All();
        $marcas = Marca::All();
        $combustibles = Combustible::All();
        $tipocaja = TipoCaja::All();
        $estadovehiculo = EstadoVehiculo::All();
        $estadoaplicativo = EstadoAplicativo::All();

        return view('Admin.vehiculos.vehiculosindex', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo'));
    }

    /**
     * 
     * @param int $id
     */
    public function verCitas($id){

        $citas = Cita::where('idproveedor', $id)->orWhere('idcliente',$id)->get();
        return view('Admin.citas.citasindex', compact('citas'));
    }
    


}
