<?php

namespace App\Http\Controllers;

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

        return response()->json(['puntaje'=>$puntaje, 'message'=>"Se registro exitosamente"]);
    }

    // LEER
    public function leerPuntaje()
    {
        $puntaje = puntaje::all();
        return response()->json(['puntaje'=>$puntaje, 'message'=>"Estos son todos los Registros"]);
    }

    // ACTUALIZAR
    public function actualizarPuntaje(Request $request, $id_puntaje)
    {
        $puntaje = puntaje::find($id_puntaje);

        if(!$puntaje){
            return response()->json(['message'=>"Puntaje no encontrado"], 404);
        }

        $puntaje->primero = $request->input('primero');
        $puntaje->segundo = $request->input('segundo');
        $puntaje->tercero = $request->input('tercero');
        $puntaje->participacion = $request->input('participacion');
        $puntaje->puntaje_extra = $request->input('puntaje_extra');
        $puntaje->id_actividad = $request->input('id_actividad');
        $puntaje->save();
        return response()->json(['puntaje'=>$puntaje, 'message'=>"El registro se Acutualizo"]);
    }

    // ELIMINAR
    public function eliminarPuntaje($id_puntaje)
    {
        $puntaje = puntaje::find($id_puntaje);
        $puntaje->delete();

        return response()->json(['puntaje'=>$puntaje, 'message'=>"El registro se elimino"]);
    }
}
