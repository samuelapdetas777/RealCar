<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstadoAplicativoController;

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

//Rutas para la administracion de los vehiculos
Route::get('/estadoaplicativo',  [App\Http\Controllers\Vehiculos\EstadoAplicativoController::class, 'index'])->name('indexEstadoAplicativo');

// Rutas Angel

Route::get('/register', [App\Http\Controllers\UserController::class, 'create'])->name('userregister');
Route::resource('user', UserController::class);

Route::resource('admin', AdminController::class);