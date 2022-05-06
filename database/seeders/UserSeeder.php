<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ 
            'id' => '8',
            'name' => 'Samuel',
            'last_name' => 'Agudelo', 
            'document' => '1017134566', 
            'phone' => '3234060182',
            'email' => 'admin@gmail.com',
            'city_id' => '19',
            'password' => bcrypt('1234'),
            'address' => 'Cra 54 #34-43',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([ 
            'id' => '16',
            'name' => 'PCliente',
            'last_name' => 'PCliente', 
            'document' => '1616161616', 
            'phone' => '6161616161',
            'email' => 'pruebacliente@gmail.com',
            'city_id' => '19',
            'password' => bcrypt('1234'),
            'address' => 'Cra 54 #34-43',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([ 
            'id' => '17',
            'name' => 'PProveedor',
            'last_name' => 'PProveedor', 
            'document' => '1717171717', 
            'phone' => '7171717171',
            'email' => 'pruebaproveedor@gmail.com',
            'city_id' => '19',
            'password' => bcrypt('1234'),
            'address' => 'Cra 54 #34-43',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
