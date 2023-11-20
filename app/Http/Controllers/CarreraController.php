<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    // CRUD

    // CREATE
    public function create(Request $request)
    {
        $carrera = new carrera();
        $carrera->id_carrera =$request->input('id_carrera');
        $carrera->nombre = $request->input('nombre');
        $carrera->id_facultad =$request->input('id_facultad');
        $carrera->save();

        return response()->json(['carrera'=>$carrera, 'message'=>"Se creo la Carrera Exitosamente"]);
    }

    // READ
    public function read()
    {
        $carrera = carrera::all();
        return response()->json(['carrera'=>$carrera, 'message', "Estos son todo los datos de la tabla carrera"]);
    }


    // UPDATE
    public function update(Request $request, $id_carrera)
    {
        // Buscar la carrera por su ID
        $carrera = carrera::find($id_carrera);

        // Verificar si la carrera existe
        if (!$carrera) {
            return response()->json(['message' => 'Carrera no encontrada'], 404);
        }

        // Actualizar los campos de la carrera con los valores de la solicitud
        $carrera->nombre = $request->input('nombre');
        $carrera->id_facultad = $request->input('id_facultad');

        // Guardar los cambios en la base de datos
        $carrera->save();

        // Devolver una respuesta JSON con un mensaje de éxito
        return response()->json(['carrera'=>$carrera, 'message' => 'El registro se actualizó con éxito']);
    }

    // DELETE
    public function delete($id_carrera)
    {
        $carrera = carrera::find($id_carrera);
        $carrera->delete();

        return response()->json(['carrera'=>$carrera,'message'=>"El registro se Elimino"]);
    }

}
