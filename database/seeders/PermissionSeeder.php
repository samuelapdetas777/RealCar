<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
//_______________________Tipos de usuarios_____________________________


             // administrador usuarios 

             'cliente',


             // administrador usuarios 

             'administrador',


              // administrador usuarios 

            'proveedor',




            //perfil
            'index',
            'ver-perfil',
            'editar-perfil',

            //iniciar sesion
            'iniciar-sesion',

            //registrar
            'registrar',

            //recuperar contraseña
            'recuperar-password',

            //cambiar contraseña
            'cambiar-password',

            //contactanos
            'contactanos',

            
            
            



            
//_______________________Administrador_____________________________

                        
            //administrador home
                        
            'admin-home',


            // administrador usuarios 

            'admin-usuario',
            
            
            // roles

            'crear-rol',
            'editar-rol',
            'ver-rol',
            'borrar-rol',


            //

            'admin-notificaciones',


            // administrador vehiculo 
            
            'admin-vehiculo',


            // administrador cita 
            
            'admin-cita',


            // administrador pedidos 
            
            'admin-pedido',


            // administrador compras 
            
            'admin-compra',


            // administrador reportes 
            
            'admin-reporte',


            // administrador ciudades 
            
            'admin-ciudad',


            // administrador usuarios 
            
            'admin-sede',


            // administrador transmisiones 
            
            'admin-transmision',


            // administrador estados del vehiculo 
            
            'admin-estadovehiculo',


            // administrador estados del aplicativo 
            
            'admin-estadoaplicativo',


            // administrador combustibles 
            
            'admin-combustible',


            // administrador marcas
            
            'admin-marca',


           




            
//_______________________Cliente_____________________________

            'c-home',
            'c-ver-catalogo',
            'c-ver-catalogo-de-proveedores',
            'c-ver-informacion-vehiculo',
            'c-agendar-cita',
            'c-ver-citas',
            'c-ver-compra',
            'c-ver-pedido',
            'c-ver-reportes',
            'c-enviar-notificaciones',
            'c-ver-notificaciones',


//_______________________Proveedor_____________________________

            'p-home',
            'p-ver-catalogo-propio',
            'p-agregar-vehiculo',
            'p-editar-vehiculo',
            'p-ver-vehiculos-propios',
            'p-ver-pedidos-vehiculo',
            'p-ver-reportes',
            'p-ver-citas',
            'p-enviar-notificaciones',
            'p-ver-notificaciones',

        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
