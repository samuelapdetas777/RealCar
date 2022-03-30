<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstadoAplicativoController;
use App\Http\Controllers\Vehiculos\TipoCajaController;
use App\Http\Controllers\Admin\VehiculoController;
use App\Http\Controllers\Admin\CompraController;
use App\Http\Controllers\Admin\PedidoController;

//roles y permisos
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\RolController;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/estadoaplicativo', [App\Http\Controllers\VehiculosController::class, 'estadoAplicativo'])->name('estadoaplicativo');

Route::group(['prefix' =>'admin'], function(){

    Route::group(['middleware' => ['auth']], function(){
        Route::resource('roles', RolController::class);
        Route::resource('usuarios', UsuarioController::class);
        Route::resource('vehiculos', VehiculoController::class);
        Route::resource('pedidos', PedidoController::class);
        Route::resource('compras', CompraController::class);
        
        
        Route::resource('ciudad', 'App\Http\Controllers\Info\CiudadController');    //Todas las ciudades de Colombia
        
        Route::resource('estadoaplicativo', 'App\Http\Controllers\Vehiculos\EstadoAplicativoController'); //Estados de los vehiculos en el aplicativo
        
        Route::resource('tipocaja', 'App\Http\Controllers\Vehiculos\TipoCajaController');   //Tipos de cajas de los vehiculos
        
        Route::resource('combustible', 'App\Http\Controllers\Vehiculos\CombustibleController'); //Los combustibles de los vehiculos
        
        Route::resource('sede', 'App\Http\Controllers\Info\SedeController');   //Las sedes de RealCar
        
        Route::resource('marca', 'App\Http\Controllers\Vehiculos\MarcaController');   //Las marcas de los vehiculos
        
        Route::resource('estadovehiculo', 'App\Http\Controllers\Vehiculos\EstadoVehiculoController');   //Los estados del vehiculo
        
        
        
    });
});

    // Rutas Angel
    Route::get('/register', [App\Http\Controllers\UserController::class, 'create'])->name('userregister');
    Route::resource('user', UserController::class);

    Route::resource('admin', AdminController::class);

