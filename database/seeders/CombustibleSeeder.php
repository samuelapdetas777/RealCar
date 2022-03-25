<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CombustibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('combustibles')->insert([ 
            'nombre' => 'Gasolina',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('combustibles')->insert([ 
            'nombre' => 'Electrico',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

        DB::table('combustibles')->insert([ 
            'nombre' => 'Diesel',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

        DB::table('combustibles')->insert([ 
            'nombre' => 'Hibrido',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
    }
}
