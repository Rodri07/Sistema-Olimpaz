<?php

namespace App\Http\Controllers;

use App\Models\actividade;
use App\Models\puntaje;
use Illuminate\Http\Request;

class PuntajeController extends Controller
{
    // CRUD

    // CREAR
    public function crearPuntaje(Request $request)
    {
        $puntaje = new puntaje();
        $puntaje->primero = $request->input('primero');
        $puntaje->segundo = $request->input('segundo');
        $puntaje->tercero = $request->input('tercero');
        $puntaje->participacion = $request->input('participacion');
        $puntaje->puntaje_extra = $request->input('puntaje_extra');
        $puntaje->id_actividad = $request->input('id_actividad');
        $puntaje->save();

        return response()->json(['puntaje' => $puntaje, 'message' => "Se registro exitosamente"]);
    }

    // LEER
    public function leerPuntaje()
    {
        $puntaje = puntaje::all();
        return response()->json(['puntaje' => $puntaje, 'message' => "Estos son todos los Registros"]);
    }

    // ACTUALIZAR
    public function actualizarPuntaje(Request $request, $id_puntaje)
    {
        $puntaje = puntaje::find($id_puntaje);

        if (!$puntaje) {
            return response()->json(['message' => "Puntaje no encontrado"], 404);
        }

        $puntaje->primero = $request->input('primero');
        $puntaje->segundo = $request->input('segundo');
        $puntaje->tercero = $request->input('tercero');
        $puntaje->participacion = $request->input('participacion');
        $puntaje->puntaje_extra = $request->input('puntaje_extra');
        $puntaje->id_actividad = $request->input('id_actividad');
        $puntaje->save();
        return response()->json(['puntaje' => $puntaje, 'message' => "El registro se Acutualizo"]);
    }

    // ELIMINAR
    public function eliminarPuntaje($id_puntaje)
    {
        $puntaje = puntaje::find($id_puntaje);
        $puntaje->delete();

        return response()->json(['puntaje' => $puntaje, 'message' => "El registro se elimino"]);
    }





    // WEB
    // Index
    public function indexPuntaje()
    {
        $actividades = actividade::all();
        return view('Puntajes.indexPuntaje', compact('actividades'));
    }

    // Registro de Puntajes
    public function registrarPuntaje(Request $request)
    {
        $request->validate([
            'lugares' => 'required',
            'puntajes' => 'required',
            'actividad' => 'required|exists:actividades,id_actividad',
        ]);

        $puntaje = new puntaje();
        $puntaje->lugares = $request->lugares;
        $puntaje->puntajes = $request->puntajes;
        $puntaje->id_actividad = $request->actividad;
        $puntaje->save();

        return redirect()->route('puntajes.indexPuntaje')->with('success', 'Puntaje registrado correctamente.');
    }

    // Puntero Registro de Puntaje
    public function punteroRegistroPuntaje(actividade $actividad)
    {
        $actividades = actividade::all(); // Obtén la lista de todas las actividades
        return compact('actividades');
    }

    // Registrar Puntaje
    public function RegistrarP(Request $request, $actividadId)
    {
        // Validación de datos del formulario
        $request->validate([
            'lugares' => 'required',
            'puntajes' => 'required',
            'actividad' => 'required|exists:actividades,id_actividad',
        ]);

        $puntaje = new puntaje();
        $puntaje->lugares = $request->lugares;
        $puntaje->puntajes = $request->puntajes;
        $puntaje->id_actividad = $request->actividad;
        $puntaje->save();

        return redirect()->route('puntajes.indexPuntaje')->with('success', 'Puntaje registrado correctamente.');
    }



    // Ver detalles
    public function detallesPuntaje($id_actividad)
    {
        // Obtén la actividad por su ID
        $actividad = Actividade::findOrFail($id_actividad);

        // Carga la relación puntajes si no se ha cargado automáticamente
        $actividad->load('puntajes');

        // Retorna la vista o los datos según tus necesidades
        return view('tu_vista_detalles', compact('actividad'));
    }

    //Puntero Eliminar
    public function punteroEiminarPuntaje($id_actividad)
    {
        $puntajes = puntaje::all();
        return view('Puntajes.modalEliminarPuntaje', compact('id_actividad', 'puntajes'));
    }

    // Eliminar Evento
    public function eliminarPutaje($id_actividad)
    {
        // Buscar todos los puntajes que tienen la clave foránea específica
        $puntajes = Puntaje::where('id_actividad', $id_actividad)->get();

        if ($puntajes->count() > 0) {
            // Eliminar cada puntaje
            foreach ($puntajes as $puntaje) {
                $puntaje->delete();
            }

            return redirect()->route('puntajes.indexPuntaje')->with("delete", "Los puntajes fueron eliminados exitosamente.");
        } else {
            return redirect()->route('puntajes.indexPuntaje')->with("error", "No se encontraron puntajes o ya fueron eliminados.");
        }
    }

}
