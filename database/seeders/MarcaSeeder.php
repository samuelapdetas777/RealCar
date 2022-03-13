<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert([ 
            'nombre' => 'Chevrolet',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

        DB::table('marcas')->insert([ 
            'nombre' => 'Toyota',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Audi',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Renault',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Mazda',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Nissan',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Kia',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Suzuki',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Volkswagen',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Ford',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Hyundai',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Mercedes-Benz',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'BMW',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Honda',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Citroën',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Subaru',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
        DB::table('marcas')->insert([ 
            'nombre' => 'Scania',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);
    }
}
