<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoRiesgoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $users =[
            [
                'nombre' => 'bajo',
                'color' => 'green'
            ],
            [
                'nombre' => 'medio',
                'color' => 'yellow'
            ],
            [
                'nombre' => 'alto',
                'color' => 'red'
            ]
        ];

        // Insertar los datos en la tabla "productos"
            DB::table('tipo_riesgo')->insert($users);
    }
}
