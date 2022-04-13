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
    public function catalogoProveedor($id){

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


        // Paginate(12);
        
        $proveedor = User::where('id', $vehiculo->user_id)->first();
        $ciudadProveedor = Ciudad::where('id', $proveedor->city_id)->first();
        $marca = Marca::where('id', $vehiculo->marcas_id)->first();
        $combustible = Combustible::where('id', $vehiculo->combustibles_id)->first();
        $tipocaja = TipoCaja::where('id', $vehiculo->tipocaja_id)->first();
        $estadovehiculo = EstadoVehiculo::where('id', $vehiculo->estadovehiculo_id)->first();

        return view('Landing.vehiculos.vervehiculo', compact('vehiculo', 'proveedor', 'ciudadProveedor', 'marca', 'combustible', 'tipocaja', 'estadovehiculo'));
    }
    

}
