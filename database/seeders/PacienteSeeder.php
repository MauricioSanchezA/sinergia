<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder {
    public function run() {
        $pacientes = [
            ['tipo_documento_id' => 1, 'numero_documento' => '1001', 'nombre1' => 'Mauricio', 'apellido1' => 'Sanchez', 'genero_id' => 1, 'departamento_id' => 1, 'municipio_id' => 1],
            ['tipo_documento_id' => 2, 'numero_documento' => '1002', 'nombre1' => 'Ana', 'apellido1' => 'Gómez', 'genero_id' => 2, 'departamento_id' => 2, 'municipio_id' => 3],
            ['tipo_documento_id' => 2, 'numero_documento' => '1003', 'nombre1' => 'Victoria', 'apellido1' => 'Henao', 'genero_id' => 2, 'departamento_id' => 3, 'municipio_id' => 5],
            ['tipo_documento_id' => 2, 'numero_documento' => '1004', 'nombre1' => 'Laura', 'apellido1' => 'Martínez', 'genero_id' => 2, 'departamento_id' => 4, 'municipio_id' => 7],
            ['tipo_documento_id' => 1, 'numero_documento' => '1005', 'nombre1' => 'Diego', 'apellido1' => 'Maradona', 'genero_id' => 1, 'departamento_id' => 5, 'municipio_id' => 9],
        ];

        foreach ($pacientes as $paciente) {
            Paciente::updateOrInsert(
                ['numero_documento' => $paciente['numero_documento']], // Busca por campo
                $paciente // Inserta 
            );
        }
    }
}
