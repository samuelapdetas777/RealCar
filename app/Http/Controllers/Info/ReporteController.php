<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Marca;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index(){

        $usuarios = User::All();
        $compra = Compra::All();
        $marcas = Marca::All();
        $vehiculos = Vehiculo::All();
        $vehiculosmasventas = DB::table('pedidos')
            ->join('vehiculos', 'pedidos.vehiculo', '=', 'vehiculos.id' )
            ->join('marcas', 'vehiculos.marcas_id', '=', 'marcas.id')
            ->select('marcas.nombre', DB::raw('count(*) as total'))
            ->groupBy('marcas.nombre')
            ->get();
        $proveedoresmasventas = DB::table('pedidos')->select('proveedor', DB::raw('count(*) as total'))->groupBy('proveedor')->orderBy('total', 'ASC')->take(10)->get();
        $vehiculosmasregistrados = DB::table('vehiculos')->select('marcas_id', DB::raw('count(*) as total'))->groupBy('marcas_id')->orderBy('total', 'ASC')->take(10)->get();
        // $vehiculosmasregistrados = DB::table('vehiculos')->select('vehiculo', DB::raw('count(*) as total'))->groupBy('marcas_id')->orderBy('total', 'ASC')->take(10)->get();

        $lugaresmasventas = DB::table('pedidos')
            ->join('users', 'pedidos.proveedor', '=', 'users.id' )
            ->join('ciudades', 'users.city_id', '=', 'ciudades.id')
            ->select('ciudades.nombre', DB::raw('count(*) as total'))
            ->groupBy('ciudades.nombre')
            ->get();
        
        return view ('Admin.reportes.reportesindex', 
        compact(
            'proveedoresmasventas',
            'vehiculosmasventas', 
            'vehiculosmasregistrados',
            'lugaresmasventas',
            'usuarios',
            'marcas'
        ));
    }
}
