<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Municipio;
use App\Models\Departamento;

class MunicipioSeeder extends Seeder {
    public function run() {
        // Verificamos departamentos
        if (Departamento::count() == 0) {
            $this->command->warn("No hay departamentos registrados. Ejecuta primero DepartamentoSeeder.");
            return;
        }

        $municipios = [
            ['nombre' => 'Medellín', 'departamento_id' => 1],
            ['nombre' => 'Bello', 'departamento_id' => 1],
            ['nombre' => 'Bogotá', 'departamento_id' => 2],
            ['nombre' => 'Soacha', 'departamento_id' => 2],
            ['nombre' => 'Cali', 'departamento_id' => 3],
            ['nombre' => 'Palmira', 'departamento_id' => 3],
            ['nombre' => 'Barranquilla', 'departamento_id' => 4],
            ['nombre' => 'Soledad', 'departamento_id' => 4],
            ['nombre' => 'Bucaramanga', 'departamento_id' => 5],
            ['nombre' => 'Floridablanca', 'departamento_id' => 5],
        ];

        foreach ($municipios as $municipio) {
            Municipio::updateOrInsert(
                ['nombre' => $municipio['nombre']], 
                ['departamento_id' => $municipio['departamento_id']]
            );
        }
    }
}

