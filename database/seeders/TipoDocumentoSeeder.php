<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    public function run()
    {
        $tipos = [
            ['nombre' => 'Cédula de Ciudadanía'],
            ['nombre' => 'Tarjeta de Identidad'],
        ];

        foreach ($tipos as $tipo) {
            DB::table('tipos_documento')->updateOrInsert(['nombre' => $tipo['nombre']], $tipo);
        }
    }
}