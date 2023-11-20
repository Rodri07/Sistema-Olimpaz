<?php

namespace App\Http\Controllers;

use App\Models\docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    // CRUD

    // CREAR
    public function crearDocente(Request $request)
    {
        $docente = new docente();
        $docente->nombre = $request->input('nombre');
        $docente->apellido_p = $request->input('apellido_p');
        $docente->apellido_m = $request->input('apellido_m');
        $docente->telefono = $request->input('telefono');
        $docente->id_carrera = $request->input('id_carrera');
        $docente->save();

        return response()->json(['docente'=>$docente, 'message'=>"Se registro exitosamente"]);
    }

    // LEER
    public function leerDocente()
    {
        $docente = docente::all();
        return response()->json(['docente'=>$docente, 'message'=>"Estos son todos los Registros"]);
    }

    // ACTUALIZAR
    public function actualizarDocente(Request $request, $id_docente)
    {
        $docente = docente::find($id_docente);

        if(!$docente){
            return response()->json(['message'=>"Docente no encontrado"], 404);
        }

        $docente->nombre = $request->input('nombre');
        $docente->apellido_p = $request->input('apellido_p');
        $docente->apellido_m = $request->input('apellido_m');
        $docente->telefono = $request->input('telefono');
        $docente->id_carrera = $request->input('id_carrera');
        $docente->save();

        return response()->json(['docente'=>$docente, 'message'=>"El registro se Acutualizo"]);
    }

    // ELIMINAR
    public function eliminarDocente($id_docente)
    {
        $docente = docente::find($id_docente);
        $docente->delete();

        return response()->json(['docente'=>$docente, 'message'=>"El registro se elimino"]);
    }

}
