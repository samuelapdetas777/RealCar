<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoAplicativoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Se crea el llenado de los estados del vehiculo en el aplicativo
        DB::table('estadoaplicativo')->insert([
            'nombre'=> 'Registrado',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('estadoaplicativo')->insert([
            'nombre'=> 'En revisión',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('estadoaplicativo')->insert([
            'nombre'=> 'Disponible',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('estadoaplicativo')->insert([
            'nombre'=> 'Vendido',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('estadoaplicativo')->insert([
            'nombre'=> 'En proceso de venta',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
