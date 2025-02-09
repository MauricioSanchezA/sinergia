<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder {
    public function run() {
        $departamentos = [
            ['nombre' => 'Antioquia'],
            ['nombre' => 'Cundinamarca'],
            ['nombre' => 'Valle del Cauca'],
            ['nombre' => 'Atlántico'],
            ['nombre' => 'Santander'],
        ];

        foreach ($departamentos as $departamento) {
            Departamento::updateOrInsert(
                ['nombre' => $departamento['nombre']], // evitar duplicados
                [] // final campos que actualizar
            );
        }
    }
}
