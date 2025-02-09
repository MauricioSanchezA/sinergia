<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;

class MunicipioController extends Controller
{
    public function getByDepartamento($departamento_id)
    {
        $municipios = Municipio::where('departamento_id', $departamento_id)->get();
        return response()->json($municipios);
    }
}
