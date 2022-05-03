<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\Combustible;
use App\Models\EstadoAplicativo;
use App\Models\EstadoVehiculo;
use App\Models\Marca;
use App\Models\TipoCaja;
use App\Models\User;
use App\Models\Vehiculo;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function __construct(){
        // $this->middleware('permission:admin-cita, index| create | store | edit | update | destroy');
        $this->middleware('permission:admin-vehiculo', ['only'=>['index']]);
        $this->middleware('permission:admin-vehiculo', ['only'=>['create', 'store']]);
        $this->middleware('permission:admin-vehiculo', ['only'=>['edit', 'update']]);
        $this->middleware('permission:admin-vehiculo', ['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = Vehiculo::where('estadoaplicativo_id', '<>', 1)->where('estadoaplicativo_id', '<>', 2)->paginate(12);
        $usuarios = User::All();
        $marcas = Marca::All();
        $combustibles = Combustible::All();
        $tipocaja = TipoCaja::All();
        $estadovehiculo = EstadoVehiculo::All();
        $estadoaplicativo = EstadoAplicativo::All();
        $titulo = "Vehiculos";
        $boton = "Editar";

        return view('Admin.vehiculos.vehiculosindex', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'titulo', 'boton'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = User::join('model_has_roles', 'model_has_roles.model_id', 'users.id')->where('model_has_roles.role_id', 9857096)->select('*')->get();
        $marcas = Marca::All();
        $combustibles = Combustible::All();
        $tipocajas = TipoCaja::All();
        $estadovehiculos = EstadoVehiculo::All();
        $estadoaplicativos = EstadoAplicativo::where('id', 1)->orWhere('id', 2)->orWhere('id', 3)->get();
        $ciudades = Ciudad::All();

        return view('Admin.vehiculos.agregarvehiculo', compact('usuarios', 'marcas', 'combustibles', 'tipocajas', 'estadovehiculos', 'estadoaplicativos', 'ciudades'));

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
            'proveedor' => 'required | exists:users,id',
            'marca' => 'required | exists:marcas,id',
            'nombre' => 'required | min:3',
            'modelo' => 'required | numeric | between:1910,2100',
            'kilometraje' => 'required | numeric | between:0,500000',
            'tipocaja' => 'required | exists:tipocaja,id',
            'motor' => 'required | min:3',
            'combustible' => 'required |  exists:combustibles,id',
            'estadovehiculo' => 'required |  exists:estadovehiculo,id',
            'color' => 'required | min:4',
            'placa' => 'required | numeric | between:0,9',
            'cplaca' => 'required |  exists:ciudades,id',
            'airbag' => 'required | numeric | between:0,20',
            'precio' => 'required | numeric | between:700000,2500000000',
            'estadoaplicativo' => 'required | exists:estadoaplicativo,id',
            'descripcion' => 'required | min:10'
            
        ]);

        $cplaca = $request->input('cplaca');

        $vehiculo = new Vehiculo();
        $vehiculo->user_id = $request->input('proveedor');
        $vehiculo->nombre = $request->input('nombre');
        $vehiculo->marcas_id = $request->input('marca');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->kilometraje = $request->input('kilometraje');
        $vehiculo->tipocaja_id = $request->input('tipocaja');
        $vehiculo->motor = $request->input('motor');
        $vehiculo->combustibles_id = $request->input('combustible');
        $vehiculo->estadovehiculo_id = $request->input('estadovehiculo');
        $vehiculo->color = $request->input('color');
        $vehiculo->placa = '**'.($request->input('placa').' '.$cplaca);
        $vehiculo->airbag = $request->input('airbag');
        $vehiculo->precio = $request->input('precio');
        $vehiculo->estadoaplicativo_id = $request->input('estadoaplicativo');
        $vehiculo->descripcion = $request->input('descripcion');
        $vehiculo->save();
        return redirect('/admin/vehiculos')->with('agregar', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $is = $id;
        $vehiculo = Vehiculo::find($id);
        $usuarios = User::All();
        $marcas = Marca::All();
        $combustibles = Combustible::All();
        $tipocajas = TipoCaja::All();
        $estadovehiculos = EstadoVehiculo::All();
        $estadoaplicativos = EstadoAplicativo::All();
        $ciudades = Ciudad::All();

        return view('Admin.vehiculos.vervehiculo', compact('vehiculo', 'usuarios', 'marcas', 'combustibles', 'tipocajas', 'estadovehiculos', 'estadoaplicativos', 'ciudades', 'is'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $is = $id;
        $vehiculo = Vehiculo::find($id);
        $roles = Role::All();
        $user = User::All();
        $usuarios = User::join('model_has_roles', 'model_has_roles.model_id', 'users.id')->where('model_has_roles.role_id', 9857096)->select('*')->get();
        $marcas = Marca::All();
        $combustibles = Combustible::All();
        $tipocajas = TipoCaja::All();
        $estadovehiculos = EstadoVehiculo::All();
        $estadoaplicativos = EstadoAplicativo::where('id', 1)->orWhere('id', 2)->orWhere('id', 3)->get();
        $ciudades = Ciudad::All();
        $boton = "Editar";

        return view('Admin.vehiculos.editarvehiculo', compact('vehiculo', 'usuarios', 'marcas', 'combustibles', 'tipocajas', 'estadovehiculos', 'estadoaplicativos', 'ciudades', 'is', 'boton'));
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
            'proveedor' => 'required | exists:users,id',
            'marca' => 'required | exists:marcas,id',
            'nombre' => 'required | min:3',
            'modelo' => 'required | numeric | between:1910,2100',
            'kilometraje' => 'required | numeric | between:0,500000',
            'tipocaja' => 'required | exists:tipocaja,id',
            'motor' => 'required | min:3',
            'combustible' => 'required |  exists:combustibles,id',
            'estadovehiculo' => 'required |  exists:estadovehiculo,id',
            'color' => 'required | min:4',
            'airbag' => 'required | numeric | between:0,20',
            'precio' => 'required | numeric | between:700000,2500000000',
            'estadoaplicativo' => 'required | exists:estadoaplicativo,id',
            'descripcion' => 'required | min:10'
            
        ]);



        $vehiculo = Vehiculo::find($id);
        $vehiculo->user_id = $request->input('proveedor');
        $vehiculo->nombre = $request->input('nombre');
        $vehiculo->marcas_id = $request->input('marca');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->kilometraje = $request->input('kilometraje');
        $vehiculo->tipocaja_id = $request->input('tipocaja');
        $vehiculo->motor = $request->input('motor');
        $vehiculo->combustibles_id = $request->input('combustible');
        $vehiculo->estadovehiculo_id = $request->input('estadovehiculo');
        $vehiculo->color = $request->input('color');
        $vehiculo->airbag = $request->input('airbag');
        $vehiculo->precio = $request->input('precio');
        $vehiculo->estadoaplicativo_id = $request->input('estadoaplicativo');
        $vehiculo->descripcion = $request->input('descripcion');
        $vehiculo->save();
        return redirect('/admin/vehiculos')->with('actualizar', 'ok');
    }


    public function vehiculosSinAprobar(){
        // echo "hsakdhfkasdhhfksadhkjh";
        $vehiculos = Vehiculo::where('estadoaplicativo_id', 1)->orWhere('estadoaplicativo_id', 2)->paginate(12);
        $usuarios = User::All();
        $marcas = Marca::All();
        $combustibles = Combustible::All();
        $tipocaja = TipoCaja::All();
        $estadovehiculo = EstadoVehiculo::All();
        $estadoaplicativo = EstadoAplicativo::All();
        $titulo = "Vehiculos sin aprobar";
        $boton = "Aprobar";

        return view('Admin.vehiculos.vehiculosindex', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'titulo', 'boton'));
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
