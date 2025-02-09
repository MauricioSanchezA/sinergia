<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    public function run()
    {
        $generos = [
            ['nombre' => 'Masculino'],
            ['nombre' => 'Femenino'],
            ['nombre' => 'No Binario'],
            ['nombre' => 'Otro'],
            ['nombre' => 'Prefiero no decirlo'],
        ];

        foreach ($generos as $genero) {
            DB::table('generos')->updateOrInsert(['nombre' => $genero['nombre']], $genero);
        }
    }
}