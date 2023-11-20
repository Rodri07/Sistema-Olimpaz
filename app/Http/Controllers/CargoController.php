<?php

namespace App\Http\Controllers;

use App\Models\cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
     // CRUD

    // CREAR
    public function crearCargo(Request $request)
    {
        $cargo = new cargo();
        $cargo->cargo = $request->input('cargo');
        $cargo->id_estudiante = $request->input('id_estudiante');
        $cargo->id_docente = $request->input('id_docente');
        $cargo->save();

        return response()->json(['cargo'=>$cargo, 'message'=>"Se registro exitosamente"]);
    }

    // LEER
    public function leerCargo()
    {
        $cargo = cargo::all();
        return response()->json(['cargo'=>$cargo, 'message'=>"Estos son todos los Registros"]);
    }

    // ACTUALIZAR
    public function actualizarCargo(Request $request, $id_cargo)
    {
        $cargo = cargo::find($id_cargo);

        if(!$cargo){
            return response()->json(['message'=>"Docente no encontrado"], 404);
        }

        $cargo->cargo = $request->input('cargo');
        $cargo->id_estudiante = $request->input('id_estudiante');
        $cargo->id_docente = $request->input('id_docente');
        $cargo->save();

        return response()->json(['cargo'=>$cargo, 'message'=>"El registro se Acutualizo"]);
    }

    // ELIMINAR
    public function eliminarCargo($id_cargo)
    {
        $cargo = cargo::find($id_cargo);
        $cargo->delete();

        return response()->json(['cargo'=>$cargo, 'message'=>"El registro se elimino"]);
    }
}
