<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([ 
            'id' => '9857095',
            'name' => 'Cliente',
            'guard_name' => 'web',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

        DB::table('roles')->insert([ 
            'id' => '9857096',
            'name' => 'Proveedor',
            'guard_name' => 'web',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

        DB::table('roles')->insert([ 
            'id' => '9857097',
            'name' => 'Administrador',
            'guard_name' => 'web',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
    }
}
