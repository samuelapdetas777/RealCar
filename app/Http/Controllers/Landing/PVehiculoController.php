<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\Combustible;
use App\Models\EstadoAplicativo;
use App\Models\EstadoVehiculo;
use App\Models\ImagenVehiculo;
use App\Models\Marca;
use App\Models\TipoCaja;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth; //se usa para sabe el usuario que a ingresado
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PVehiculoController extends Controller
{
    public function __construct(){
        // $this->middleware('permission:admin-cita, index| create | store | edit | update | destroy');
        $this->middleware('permission:p-ver-catalogo-propio', ['only'=>['index']]);
        $this->middleware('permission:p-agregar-vehiculo', ['only'=>['agregarvehiculo', 'guardarvehiculo']]);
        $this->middleware('permission:p-editar-vehiculo', ['only'=>['editar', 'guardarEditar']]);
        $this->middleware('permission:p-ver-vehiculos-propios', ['only'=>['verVehiculo']]);
        $this->middleware('permission:p-ver-pedidos', ['only'=>['verPedidos']]);
        $this->middleware('permission:p-ver-citas', ['only'=>['verCitas']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function index(Request $request)
    {
        
        $texto = $request->texto;

        if(!empty($texto)){
            $vehiculos = DB::select('SELECT v.* 
                FROM vehiculos AS v 
                JOIN users AS u ON v.user_id = u.id 
                JOIN marcas AS m ON v.marcas_id = m.id 
                JOIN estadovehiculo AS ev ON v.estadovehiculo_id = ev.id 
                JOIN estadoaplicativo AS ea ON v.estadoaplicativo_id = ea.id
                WHERE v.estadoaplicativo_id IN (1,2,3)
                AND (
                    v.nombre LIKE "%'.$texto.'%" 
                    OR u.name LIKE "%'.$texto.'%" 
                    OR u.last_name LIKE "%'.$texto.'%" 
                    OR v.precio LIKE "%'.$texto.'%" 
                    OR v.motor LIKE "%'.$texto.'%" 
                    OR m.nombre LIKE "%'.$texto.'%" 
                    OR ev.nombre LIKE "%'.$texto.'%"
                    OR ea.nombre LIKE "%'.$texto.'%"
                    )');

            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
    
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();

            return view('Landing.vehiculos.vehiculosindex', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto'));        
        }else{

            $id = Auth::user()->id;
            $vehiculos = Vehiculo::whereIn('estadoaplicativo_id',[1,2,3])->where('user_id', $id)->paginate(12);
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();

            return view('Landing.vehiculos.vehiculosindex', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agregarvehiculo()
    {
        
        $marcas = Marca::All();
        $combustibles = Combustible::All();
        $tipocajas = TipoCaja::All();
        $estadovehiculos = EstadoVehiculo::All();
        $ciudades = Ciudad::All();

        return view('Landing.vehiculos.agregarvehiculo', compact('marcas', 'combustibles', 'tipocajas', 'estadovehiculos', 'ciudades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function guardarvehiculo(Request $request)
    {

        // echo Auth::user()->id; //

        // Auth::user()->id

        $request->validate([
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
            'descripcion' => 'required | min:10'
            
        ]);
        $proveedor = Auth::user()->id;
        $cplaca = $request->input('cplaca');

        $vehiculo = new Vehiculo();
        $vehiculo->user_id = $proveedor;
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
        $vehiculo->estadoaplicativo_id = 1;
        $vehiculo->descripcion = $request->input('descripcion');
        $vehiculo->save();
        return redirect('/vehiculos/index')->with('agregar', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verVehiculo($id)
    {
        $vehiculo = Vehiculo::find($id);
        $e = 0;
        
        if (empty($vehiculo)) {
            // echo $x;
            $e = 3;
            $texto = '';

            $id = Auth::user()->id;
            $vehiculos = Vehiculo::whereIn('estadoaplicativo_id',[1,2,3])->where('user_id', $id)->paginate(12);
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();

            return view('Landing.vehiculos.vehiculosindex', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto', 'e'));
         }elseif ($vehiculo->estadoaplicativo_id != 1 || $vehiculo->estadoaplicativo_id != 2 || $vehiculo->estadoaplicativo_id != 3 || $vehiculo->user_id != $id) {
            $e = 1;
            $texto = '';

            $id = Auth::user()->id;
            $vehiculos = Vehiculo::whereIn('estadoaplicativo_id',[1,2,3])->where('user_id', $id)->paginate(12);
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();

            return view('Landing.vehiculos.vehiculosindex', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto', 'e'));
        }
        else{

            $imagenes = ImagenVehiculo::where('idvehiculo', $id)->get();
            
            $estadoaplicativo = EstadoAplicativo::where('id', $vehiculo->estadoaplicativo_id)->first();
            $proveedor = User::where('id', $vehiculo->user_id)->first();
            $ciudadProveedor = Ciudad::where('id', $proveedor->city_id)->first();
            $marca = Marca::where('id', $vehiculo->marcas_id)->first();
            $combustible = Combustible::where('id', $vehiculo->combustibles_id)->first();
            $tipocaja = TipoCaja::where('id', $vehiculo->tipocaja_id)->first();
            $estadovehiculo = EstadoVehiculo::where('id', $vehiculo->estadovehiculo_id)->first();
    
            return view('Landing.vehiculos.proveedor.vervehiculo', compact('vehiculo', 'proveedor', 'ciudadProveedor', 'marca', 'combustible', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $vehiculo = Vehiculo::find($id); 
        $marcas = Marca::All();
        $combustibles = Combustible::All();
        $tipocajas = TipoCaja::All();
        $estadovehiculos = EstadoVehiculo::All();
        $ciudades = Ciudad::All();

        return view('Landing.vehiculos.proveedor.editarvehiculo', compact('vehiculo', 'marcas', 'combustibles', 'tipocajas', 'estadovehiculos', 'ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function guardarEditar($id, Request $request)
    {
        $request->validate([
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
            'descripcion' => 'required | min:10'
            
        ]);

        $vehiculo = Vehiculo::find($id);
        // $vehiculo->user_id = $proveedor;
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
        $vehiculo->descripcion = $request->input('descripcion');
        $vehiculo->save();
        return redirect('/vehiculos/index')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verPedidos()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verCitas()
    {
        //
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
