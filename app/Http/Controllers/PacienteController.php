<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Departamento;
use App\Models\Municipio;
use App\Models\TipoDocumento;
use App\Models\Genero;
use Illuminate\Database\QueryException;

class PacienteController extends Controller
{
    // Listar pacientes
    public function index()
    {
        $pacientes = Paciente::with(['departamento', 'municipio', 'tipoDocumento', 'genero'])->paginate(10);
        return view('pacientes.index', compact('pacientes'));
    }

    // Formulario para crear paciente
    public function create()
    {
        $departamentos = Departamento::all();
        $tipos_documento = TipoDocumento::all();
        $generos = Genero::all();
        
        return view('pacientes.create', compact('departamentos', 'tipos_documento', 'generos'));
    }

    // Guardar paciente en la BD
    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento_id' => 'required',
            'numero_documento' => 'required|unique:pacientes,numero_documento',
            'nombre1' => 'required',
            'apellido1' => 'required',
            'genero_id' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
        ]);

        try {
            Paciente::create([
                'tipo_documento_id' => $request->tipo_documento_id,
                'numero_documento' => trim(strtolower($request->numero_documento)),
                'nombre1' => trim($request->nombre1),
                'apellido1' => trim($request->apellido1),
                'genero_id' => $request->genero_id,
                'departamento_id' => $request->departamento_id,
                'municipio_id' => $request->municipio_id,
            ]);

            return redirect()->route('pacientes.index')->with('success', 'Paciente registrado correctamente.');
        } catch (QueryException $e) {
            return back()->withErrors(['error' => 'No se pudo registrar el paciente. Verifica los datos e intenta de nuevo.']);
        }
    }

    // Ver un paciente en detalle
    public function show(Paciente $paciente)
    {
        return view('pacientes.show', compact('paciente'));
    }

    // Formulario para editar paciente
    public function edit(Paciente $paciente)
    {
        $departamentos = Departamento::all();
        $tipos_documento = TipoDocumento::all();
        $generos = Genero::all();
        $municipios = Municipio::where('departamento_id', $paciente->departamento_id)->get();

        return view('pacientes.edit', compact('paciente', 'departamentos', 'tipos_documento', 'generos', 'municipios'));
    }

    // Actualizar paciente en la BD
    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'tipo_documento_id' => 'required',
            'numero_documento' => 'required|unique:pacientes,numero_documento,' . $paciente->id,
            'nombre1' => 'required',
            'apellido1' => 'required',
            'genero_id' => 'required',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
        ]);

        try {
            $paciente->update([
                'tipo_documento_id' => $request->tipo_documento_id,
                'numero_documento' => trim(strtolower($request->numero_documento)),
                'nombre1' => trim($request->nombre1),
                'apellido1' => trim($request->apellido1),
                'genero_id' => $request->genero_id,
                'departamento_id' => $request->departamento_id,
                'municipio_id' => $request->municipio_id,
            ]);

            return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente.');
        } catch (QueryException $e) {
            return back()->withErrors(['error' => 'No se pudo actualizar el paciente. Verifica los datos e intenta de nuevo.']);
        }
    }

    // Eliminar paciente
    public function destroy(Paciente $paciente)
    {
        try {
            $paciente->delete();
            return redirect()->route('pacientes.index')->with('success', 'Paciente eliminado correctamente.');
        } catch (QueryException $e) {
            return back()->withErrors(['error' => 'No se pudo eliminar el paciente.']);
        }
    }
}
