<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use App\Models\Ciudad;
use App\Models\Combustible;
use App\Models\EstadoAplicativo;
use App\Models\EstadoVehiculo;
use App\Models\ImagenVehiculo;
use App\Models\Marca;
use App\Models\Sede;
use App\Models\TipoCaja;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CVehiculoController extends Controller
{
    public function __construct(){
        // $this->middleware('permission:admin-cita, index| create | store | edit | update | destroy');
        $this->middleware('permission:c-ver-catalogo', ['only'=>['index']]);
        $this->middleware('permission:c-ver-catalogo-de-proveedores', ['only'=>['catalogoProveedor']]);
        $this->middleware('permission:c-ver-informacion-vehiculo', ['only'=>['verVehiculo']]);
        $this->middleware('permission:c-agendar-cita', ['only'=>['agendarCita', 'guardarCita']]);
        $this->middleware('permission:c-ver-citas', ['only'=>['verCitas']]);
        $this->middleware('permission:c-ver-pedido', ['only'=>['verPedidos']]);
    }

    public function index(Request $request){


        
        $texto = $request->texto;

        if(!empty($texto)){
            $vehiculos = DB::select('SELECT v.* 
                FROM vehiculos AS v 
                JOIN users AS u ON v.user_id = u.id 
                JOIN marcas AS m ON v.marcas_id = m.id 
                JOIN estadovehiculo AS ev ON v.estadovehiculo_id = ev.id 
                WHERE v.estadoaplicativo_id IN (3)
                AND (
                    v.nombre LIKE "%'.$texto.'%" 
                    OR u.name LIKE "%'.$texto.'%" 
                    OR u.last_name LIKE "%'.$texto.'%" 
                    OR v.precio LIKE "%'.$texto.'%" 
                    OR v.motor LIKE "%'.$texto.'%" 
                    OR m.nombre LIKE "%'.$texto.'%" 
                    OR ev.nombre LIKE "%'.$texto.'%"
                    )');
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            $action = 'c';

            return view('Landing.vehiculos.catalogo', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto', 'action'));
        }else{

            $vehiculos = Vehiculo::where('estadoaplicativo_id', 3)->paginate(12);
            // Paginate(12);
            
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            $action = 'c';

            return view('Landing.vehiculos.catalogo', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto', 'action'));
        }
    }

    /**
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function catalogoProveedor($id){  //se desplegará cuando el usuario de click a un catalogo para ver mas vehiculos

        $user = User::find($id);
        $texto = '';
        if(empty($user)){
            $e = 5;
            $vehiculos = Vehiculo::where('estadoaplicativo_id', 3)->paginate(12);
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            $action = 'c';

            return view('Landing.vehiculos.catalogo', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto', 'action', 'e'));
        
        }elseif ($user->state == 0) {
            $e = 4;
            $vehiculos = Vehiculo::where('estadoaplicativo_id', 3)->paginate(12);
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            $action = 'c';

            return view('Landing.vehiculos.catalogo', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto', 'action', 'e'));
        
        }else{ 
            $vehiculos = Vehiculo::where('estadoaplicativo_id', 3)->where('user_id', $id)->paginate(12);
            $texto = '';
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            $action = 'cp';

            return view('Landing.vehiculos.catalogo', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto', 'action'));
        }
    }
    
    
    /**
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function verVehiculo($id){
        $texto = '';
        $vehiculo = Vehiculo::find($id);
        $userstate = User::join('vehiculos', 'users.id', 'vehiculos.user_id')->select('users.state')->where('vehiculos.id', $id)->get(); 
        
        if (empty($vehiculo)) {
            $e = 3;
            $vehiculos = Vehiculo::where('estadoaplicativo_id', 3)->paginate(12);
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            $action = 'c';
            return view('Landing.vehiculos.catalogo', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto', 'action', 'e'));
        }elseif ($vehiculo->estadoaplicativo_id != 3) { // || $userstate->state != 1 
            $e = 2;
            $vehiculos = Vehiculo::where('estadoaplicativo_id', 3)->paginate(12);
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            $action = 'c';

            return view('Landing.vehiculos.catalogo', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto', 'action', 'e'));
        }
        else {
            $vehiculosProveedor = Vehiculo::where('user_id', $vehiculo->user_id)->take(4)->get();
            $vehiculosSimilares = Vehiculo::where('nombre', 'like', '%'. $vehiculo->nombre. '%')->take(4)->get();
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            $marcas = Marca::All();
            $estadovehiculos = EstadoVehiculo::All();
            $estadoaplicativos = EstadoAplicativo::All();
            $imagenesVehiculo = ImagenVehiculo::where('idvehiculo', $id)->get(); 
            $proveedor = User::where('id', $vehiculo->user_id)->first();
            $ciudadProveedor = Ciudad::where('id', $proveedor->city_id)->first();
            $marca = Marca::where('id', $vehiculo->marcas_id)->first();
            $combustible = Combustible::where('id', $vehiculo->combustibles_id)->first();
            $tipocaja = TipoCaja::where('id', $vehiculo->tipocaja_id)->first();
            $estadovehiculo = EstadoVehiculo::where('id', $vehiculo->estadovehiculo_id)->first();

            return view('Landing.vehiculos.vervehiculo', compact('vehiculo', 'vehiculosProveedor', 'vehiculosSimilares', 'proveedor', 'ciudadProveedor', 'marca', 'combustible', 'tipocaja', 'estadovehiculo', 'marcas', 'estadoaplicativos', 'estadovehiculos', 'imagenesVehiculo', 'imagenes'));
        }
    }

    /**
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function agendarCita($id){
        $texto = '';
        $vehiculo = Vehiculo::find($id);
        if (empty($vehiculo)) {
            $e = 3;
            $vehiculos = Vehiculo::where('estadoaplicativo_id', 3)->paginate(12);
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            $action = 'c';
            return view('Landing.vehiculos.catalogo', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto', 'action', 'e'));
        }elseif ($vehiculo->estadoaplicativo_id != 3) {
            $e = 2;
            $vehiculos = Vehiculo::where('estadoaplicativo_id', 3)->paginate(12);
            $usuarios = User::All();
            $marcas = Marca::All();
            $combustibles = Combustible::All();
            $tipocaja = TipoCaja::All();
            $estadovehiculo = EstadoVehiculo::All();
            $estadoaplicativo = EstadoAplicativo::All();
            $imagenes = ImagenVehiculo::where('prioridad', 1)->get(); 
            $action = 'c';

            return view('Landing.vehiculos.catalogo', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo', 'imagenes', 'texto', 'action', 'e'));
        }else{
            
            $imagen = ImagenVehiculo::where('idvehiculo', $id)->where('prioridad', 1)->first();
            $marca = Vehiculo::join('marcas', 'marcas.id', 'vehiculos.marcas_id')->select(DB::raw('marcas.nombre'))->where('vehiculos.id', $id)->first();
            $estadovehiculo = Vehiculo::join('estadovehiculo as ev', 'ev.id', 'vehiculos.estadovehiculo_id')->select(DB::raw('ev.nombre'))->where('vehiculos.id', $id)->first();
            $estadoaplicativo= Vehiculo::join('estadoaplicativo as ea', 'ea.id', 'vehiculos.estadoaplicativo_id')->select(DB::raw('ea.nombre'))->where('vehiculos.id', $id)->first();
            $proveedor = Vehiculo::join('users', 'users.id', 'vehiculos.user_id')->select(DB::raw('users.name, users.last_name, users.id'))->where('vehiculos.id', $id)->first();
            $sedes = Sede::All();
            return view('Landing.vehiculos.agendarcita', compact('vehiculo', 'sedes', 'marca', 'estadovehiculo', 'estadoaplicativo', 'proveedor', 'imagen'));
        }
    }
    
    /**
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function guardarCita(Request $request, $id){

        $request->validate([
            'fecha' => 'required | date',
            'hora' => 'required | date_format:H:i',
            'sede' => 'required | exists:sedes,id',

        ]);

        $cita = new Cita();
        $cita->asunto = 'Visualización de vehículo';
        $cita->idvehiculo = $id;
        $cita->idcliente = Auth::user()->id;
        $cita->fecha = $request->input('fecha');
        $cita->hora = $request->input('hora');
        $cita->sedes_id = $request->input('sede');
        $cita->estado = 0;
        $cita->save();

        return redirect('/catalogo')->with('agregarcita', 'ok');

    }
    
    /**
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function verCitas(){

    }
    
    /**
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function verPedidos(){

    }
    

    

}
