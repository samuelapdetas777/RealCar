<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {

        $user = auth()->user()->id;
        // $rol = DB::select('SELECT role_id FROM model_has_roles where model_id = '.$user.'');
        $rol =  Role::join('model_has_roles', 'model_has_roles.role_id', 'roles.id')->where('model_has_roles.model_id', $user)->select('roles.id')->first();
        // if ($rol == 'Administrador' || $user == 8) {
        //     return '/admin/home';
        // }
        // elseif ($rol == 'Proveedor') {
        //     return '/vehiculos/index';
        // }else{
        //     return '/catalogo';
        // }

        if ($rol->id === 9857097 || $user == 8) {
            return '/admin/home';
        }
        elseif ($rol->id === 9857096) {
            return '/vehiculos/index';
        }else{
            return '/catalogo';
        }
        
    }
}
