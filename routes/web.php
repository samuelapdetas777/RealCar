<?php

use App\Http\Controllers\Admin\CitaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstadoAplicativoController;
use App\Http\Controllers\Vehiculos\TipoCajaController;
use App\Http\Controllers\Admin\VehiculoController;
use App\Http\Controllers\Admin\CompraController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Info\ReporteController;

//roles y permisos
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\RolController;
use App\Http\Controllers\Landing\UUsuarioController;

use App\Http\Controllers\Landing\PVehiculoController;
use App\Http\Controllers\Landing\CVehiculoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', function () {
    return view('landing');
})->name('landingpage');


Auth::routes();



Route::group(['middleware' => ['permission:index']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'usuarioIndex'])->name('home');
});



Route::group(['middleware' => ['permission:admin-home']], function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('adminhome');
});


// Route::get('/estadoaplicativo', [App\Http\Controllers\VehiculosController::class, 'estadoAplicativo'])->name('estadoaplicativo');

Route::group(['prefix' =>'admin'], function(){

    Route::group(['middleware' => ['auth']], function(){
        Route::get('/reportes', [ReporteController::class, 'index']);
        Route::resource('roles', RolController::class);
        Route::resource('usuarios', UsuarioController::class);
        Route::resource('vehiculos', VehiculoController::class);
        Route::get('/vehiculossinaprobar', [VehiculoController::class, 'vehiculosSinAprobar']);

        Route::resource('pedidos', PedidoController::class);
        Route::resource('compras', CompraController::class);
        Route::resource('citas', CitaController::class);
        Route::post('/citasfecha', [CitaController::class, 'citasPorFecha']);
        Route::get('/citasagendadas', [CitaController::class, 'indexCitasAgendadas']);
        Route::get('/mostrarcitasagendadas', [CitaController::class, 'mostrarCitasAgendadas']);
        Route::get('/vercitasmodal', [CitaController::class, 'verCitaModal']);
        
        
        Route::resource('ciudad', 'App\Http\Controllers\Info\CiudadController');    //Todas las ciudades de Colombia
        
        Route::resource('estadoaplicativo', 'App\Http\Controllers\Vehiculos\EstadoAplicativoController'); //Estados de los vehiculos en el aplicativo
        
        Route::resource('tipocaja', 'App\Http\Controllers\Vehiculos\TipoCajaController');   //Tipos de cajas de los vehiculos
        
        Route::resource('combustible', 'App\Http\Controllers\Vehiculos\CombustibleController'); //Los combustibles de los vehiculos
        
        Route::resource('sede', 'App\Http\Controllers\Info\SedeController');   //Las sedes de RealCar
        
        Route::resource('marca', 'App\Http\Controllers\Vehiculos\MarcaController');   //Las marcas de los vehiculos
        
        Route::resource('estadovehiculo', 'App\Http\Controllers\Vehiculos\EstadoVehiculoController');   //Los estados del vehiculo
        
        
        Route::get('/catalogo/{id}', [UsuarioController::class, 'verCatalogo']);
        Route::get('/citas/cliente/{id}', [UsuarioController::class, 'verCitas']);
    });
});


Route::group(['middleware' => ['auth']], function(){
    Route::get('/perfil', [UUsuarioController::class, 'show']);
    Route::get('/perfil/editar', [UUsuarioController::class, 'edit']);
    Route::put('/perfil/guardar', [UUsuarioController::class, 'update']);
    Route::get('/citas', [UUsuarioController::class, 'verCitas']);
    Route::get('/mostrarcitasagendadas', [UUsuarioController::class, 'mostrarCitasAgendadas']);
    Route::get('/cita/{id}', [UUsuarioController::class, 'verCita']);
    
    Route::get('/vehiculos/index', [PVehiculoController::class, 'index']);
    Route::get('/vehiculos/nuevo', [PVehiculoController::class, 'agregarvehiculo']);
    Route::post('/vehiculos/guardar', [PVehiculoController::class, 'guardarvehiculo']);
    Route::get('/vehiculos/vehiculo/{id}', [PVehiculoController::class, 'verVehiculo']);
    Route::get('/vehiculos/editar/{id}', [PVehiculoController::class, 'editar']);
    Route::put('/vehiculos/editar/guardar/{id}', [PVehiculoController::class, 'guardarEditar']);


    
    Route::get('/catalogo', [CVehiculoController::class, 'index']);
    Route::get('/catalogo/{id}', [CVehiculoController::class, 'catalogoProveedor']);
    Route::get('/catalogo/vehiculo/{id}', [CVehiculoController::class, 'verVehiculo']);
    Route::get('/cita/{id}/nueva', [CVehiculoController::class, 'agendarCita']);
    Route::post('/cita/{id}/guardar', [CVehiculoController::class, 'guardarCita']);


    
});




    // Rutas Angel
    Route::get('/register', [App\Http\Controllers\UserController::class, 'create'])->name('userregister');
    Route::resource('user', UserController::class);


