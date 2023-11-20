<?php

namespace App\Http\Controllers;

use App\Models\estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{

    // CRUD WEB
    public function punteroListaEstudiante()
    {
        $estudiante = estudiante::paginate(7);
        return view('Estudiantes.listaEstudiante', ['estudiante' => $estudiante]);
    }

    // CREAR
    public function crearEstudiante(Request $request)
    {
        $estudiante = new estudiante();
        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellido_p = $request->input('apellido_p');
        $estudiante->apellido_m = $request->input('apellido_m');
        $estudiante->id_carrera = $request->input('id_carrera');
        $estudiante->save();

        return response()->json(['estudiante'=>$estudiante, ]);
    }

    // LEER
    public function leerEstudiante()
    {
        $estudiante = estudiante::all();
        return response()->json(['estudiante'=>$estudiante, 'message'=>"Estos son todos los Registros"]);
    }

    // ACTUALIZAR
    public function actualizarEstudiante(Request $request, $id_estudiante)
    {
        $estudiante = estudiante::find($id_estudiante);

        if(!$estudiante){
            return response()->json(['message'=>"Docente no encontrado"], 404);
        }

        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellido_p = $request->input('apellido_p');
        $estudiante->apellido_m = $request->input('apellido_m');
        $estudiante->id_carrera = $request->input('id_carrera');
        $estudiante->save();

        return response()->json(['estudiante'=>$estudiante, 'message'=>"El registro se Acutualizo"]);
    }

    // ELIMINAR
    public function eliminarEstudiante($id_estudiante)
    {
        $estudiante = estudiante::find($id_estudiante);
        $estudiante->delete();

        return response()->json(['estudiante'=>$estudiante, 'message'=>"El registro se elimino"]);
    }

    // equipos

}
