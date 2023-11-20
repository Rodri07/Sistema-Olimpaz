<?php

namespace App\Http\Controllers;

use App\Models\actividade;
use Illuminate\Http\Request;

class ActividadeController extends Controller
{
        // WEB
    // ver la lista
    public function punteroListaActividades()
    {
        $actividades = actividade::paginate(10);
        return view('Actividades.listaActividades', compact('actividades'));
    }

    // CREAR
    public function crearActividad(Request $request)
    {
        $actividad = new actividade();
        $actividad->nombre = $request->input('nombre');
        $actividad->save();

        return redirect()->route('actividades.punteroListaActividades')->with('success', 'Actividad registrada correctamente.');
    }

    // Puntero Editar Actividad
public function punteroEditarActividad($id_actividad)
{
    $actividad = actividade::findOrFail($id_actividad);
    return view('Actividades.modalEditarActividad', compact('actividad'));
}

// ACTUALIZAR Actividad
public function actualizarActividad(Request $request, $id_actividad)
{
    // Valida y actualiza los datos de la actividad
    $request->validate([
        'nombre' => 'required|string',
    ]);

    $actividad = actividade::findOrFail($id_actividad);

    $actividad->update([
        'nombre' => $request->input('nombre'),
    ]);

    return redirect()->route('actividades.punteroListaActividades')->with("success", "Se editó la información exitosamente!");
}


    // // ELIMINAR
    // public function eliminarActividad($id_actividad)
    // {
    //     $actividad = actividade::find($id_actividad);
    //     $actividad->delete();

    //     return redirect()->route('actividades.punteroListaActividades')->with('delete', 'Actividad eliminada correctamente.');
    // }

       // ELIMINAR
       public function punteroEliminarActividad($id_actividad)
       {
           $actividades = actividade::find($id_actividad);
           return view('Actividades.modalEliminarActividad', compact('actividades'));
       }

       // Cambia el nombre del método a eliminarActividad
public function eliminarActividad($id_actividad)
{
    $actividades = actividade::find($id_actividad);
    $actividades->delete();

    return redirect()->route('actividades.punteroListaActividades')->with("delete", "Se elimino la información exitosamente!");
}

}

