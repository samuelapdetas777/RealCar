<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciudad;
use Illuminate\Support\Facades\DB;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('ciudades')->insert([ 
            'nombre' => 'Armenia',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);


        DB::table('ciudades')->insert([ 
            'nombre' => 'Barrancabermeja',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

    

         DB::table('ciudades')->insert([ 
         'nombre' => 'Bogotá',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Bucaramanga',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Buga',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Cali',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);


         DB::table('ciudades')->insert([ 
         'nombre' => 'Cartagena',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);


         DB::table('ciudades')->insert([ 
         'nombre' => 'Duitama',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);


         DB::table('ciudades')->insert([ 
         'nombre' => 'Florencia',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Fusagasugá',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Girardot',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Honda',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Ibagué',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Ipiales',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Jamundí',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Leticia',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Manizales',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Mariquita',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Medellín',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Mompox',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Montería',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Murillo',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Neiva',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Pamplona',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Pasto',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Pereira',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Popayán',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Riohacha',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'San Andrés y Providencia',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'San Antero',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Santa Marta',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Santafé de Antioquia',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Sevilla',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Sincelejo',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Sogamoso',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Tabio',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Tocancipá',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Tolú',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Tuluá',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Tumaco',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Tunja',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Valledupar',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Villavicencio',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Yopal',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);

         DB::table('ciudades')->insert([ 
         'nombre' => 'Zipaquirá',
            'created_at'=> date("Y-m-d H:i:s"),
            'updated_at'=> date("Y-m-d H:i:s"),
        ]);


    }
}
