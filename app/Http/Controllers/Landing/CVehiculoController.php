<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\Combustible;
use App\Models\EstadoAplicativo;
use App\Models\EstadoVehiculo;
use App\Models\Marca;
use App\Models\TipoCaja;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class CVehiculoController extends Controller
{
    public function index(){
        $vehiculos = Vehiculo::where('estadoaplicativo_id', 3)->paginate(12);
        // Paginate(12);
        
        $usuarios = User::All();
        $marcas = Marca::All();
        $combustibles = Combustible::All();
        $tipocaja = TipoCaja::All();
        $estadovehiculo = EstadoVehiculo::All();
        $estadoaplicativo = EstadoAplicativo::All();

        return view('Landing.vehiculos.catalogo', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo'));
    }

    /**
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function catalogoProveedor($id){  //se desplegará cuando el usuario de click a un catalogo para ver mas vehiculos

        $vehiculos = Vehiculo::where('estadoaplicativo_id', 3)->where('user_id', $id)->paginate(12);

        // Paginate(12);
        
        $usuarios = User::All();
        $marcas = Marca::All();
        $combustibles = Combustible::All();
        $tipocaja = TipoCaja::All();
        $estadovehiculo = EstadoVehiculo::All();
        $estadoaplicativo = EstadoAplicativo::All();

        return view('Landing.vehiculos.catalogo', compact('vehiculos', 'usuarios', 'marcas', 'combustibles', 'tipocaja', 'estadovehiculo', 'estadoaplicativo'));
    }
    
    /**
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function verVehiculo($id){

        $vehiculo = Vehiculo::where('id', $id)->first();

        $vehiculosProveedor = Vehiculo::where('user_id', $vehiculo->user_id)->take(4)->get();
        // $vehiculosNombre;

        // Paginate(12);
        $marcas = Marca::All();
        $estadovehiculos = EstadoVehiculo::All();
        $estadoaplicativos = EstadoAplicativo::All();


        $proveedor = User::where('id', $vehiculo->user_id)->first();
        $ciudadProveedor = Ciudad::where('id', $proveedor->city_id)->first();
        $marca = Marca::where('id', $vehiculo->marcas_id)->first();
        $combustible = Combustible::where('id', $vehiculo->combustibles_id)->first();
        $tipocaja = TipoCaja::where('id', $vehiculo->tipocaja_id)->first();
        $estadovehiculo = EstadoVehiculo::where('id', $vehiculo->estadovehiculo_id)->first();

        return view('Landing.vehiculos.vervehiculo', compact('vehiculo', 'vehiculosProveedor', 'proveedor', 'ciudadProveedor', 'marca', 'combustible', 'tipocaja', 'estadovehiculo', 'marcas', 'estadoaplicativos', 'estadovehiculos'));
    }

    /**
     * @return \Illuminate\Http\Response
     * @param int $id
     */
    public function cita(){

    }
    

}
