<?php

namespace App\Http\Controllers;

use App\Models\actividade;
use App\Models\carrera;
use App\Models\equipo;
use App\Models\estudiante;
use App\Models\evento;
use App\Models\facultade;
use App\Models\puntaje;
use Illuminate\Http\Request;

class EquipoController extends Controller
{

    // Pagina Principal
    public function punteroIndexEquipos()
    {
        $equipos = equipo::all();
        return view('Equipos.indexEquipos', compact('equipos'));
    }

    // PunteroRegistroEquipo
    public function punteroRegistroEquipo()
    {
        $facultades = facultade::all();
        $carreras = Carrera::all();
        $eventos = Evento::all(); // Asegúrate de usar el nombre correcto del modelo Evento
        $actividades = actividade::all(); // Asegúrate de usar el nombre correcto del modelo Evento
        $puntajes = puntaje::all();

        return view('Equipos.indexEquipos', compact('carreras', 'eventos', 'actividades', 'puntajes', 'facultades'));
    }

    // Registro del Equipo
    public function registrarEquipo(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'facultad' => 'required|exists:facultades,id_facultad',
            'carrera' => 'required|exists:carreras,id_carrera',
            'evento' => 'required|exists:eventos,id_evento',
            'actividade' => 'required|exists:actividades,id_actividad',
            'puntaje' => 'required|exists:puntajes,id_puntaje',
        ]);

        $puntajePorDefectoId = 4;

        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->id_facultad = $request->facultad;
        $equipo->id_carrera = $request->carrera;
        $equipo->id_evento = $request->evento;
        $equipo->id_actividad = $request->actividade;
        $equipo->id_puntaje = $request->puntaje;
        $equipo->save();

        $equipo->puntajes()->attach($request->puntaje);
        return redirect()->route('equipos.punteroIndexEquipos')->with('success', 'Equipo registrado correctamente.');
    }

    // Puntero Registro de Estudiantes
    public function punteroRegistroEstdiante(Equipo $equipo)
    {
        $estudiantes = Estudiante::all(); // Obtén la lista de todos los estudiantes
        return view('Equipos.RegistroEstudiante', compact('equipo', 'estudiantes'));
    }

    // Registrar estudiante en el equipo
    public function RegistrarEstudiante(Request $request, $equipoId)
    {
        // Validación de datos del formulario
        $request->validate([
            'estudiante' => 'required|exists:estudiantes,id_estudiante',
        ]);

        // Obtener el estudiante seleccionado
        $estudiante = Estudiante::findOrFail($request->estudiante);

        // Obtener el equipo
        $equipo = Equipo::findOrFail($equipoId);

        // Asociar el estudiante al equipo
        $equipo->estudiantes()->attach($estudiante);

        return redirect()->route('equipos.punteroIndexEquipos')->with('success', 'Estudiante registrado correctamente.');
    }

    // Ver estudiantes
    public function verEstudiantes(Equipo $equipo)
    {
        $estudiantes = $equipo->estudiantes; // Obtén los estudiantes asociados al equipo

        return  compact('equipo', 'estudiantes');
    }

    // Ver detalles
    public function detalles(Equipo $equipo)
    {
        // Puedes cargar relaciones si no se han cargado automáticamente
        $equipo->load('facultades', 'carreras', 'eventos','actividades','puntajes', 'estudiantes');

        return compact('equipo');
    }


    //Puntero Eliminar
    public function punteroEiminar($id_equipo)
    {
        return view('Equipos.modalEliminarEquipo', compact('id_equipo'));
    }

    // Eliminar Evento
    public function eliminarEquipo($id_equipo)
    {
        $equipo = equipo::find($id_equipo); // Buscar el usuario por su ID

        if ($equipo) {
            $equipo->delete(); // Eliminar el usuario
            return redirect()->route('equipos.punteroIndexEquipos')->with("delete", "El Equipo se eliminó exitosamente.");
        } else {
            return redirect()->route('equipos.punteroIndexEquipos')->with("error", "El Equipo no se encontró o ya fue eliminado.");
        }
    }

}
