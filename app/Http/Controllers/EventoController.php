<?php

namespace App\Http\Controllers;

use App\Models\actividade;
use App\Models\evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    // // CREAR
    // public function crearEvento(Request $request)
    // {
    //     $evento = new evento();
    //     $evento->nombre = $request->input('nombre');
    //     $evento->save();

    //     return redirect()->route('evento.punteroListaEvento')->with("success", "Se registro exitosamente");
    // }

    // // LEER
    // public function leerEvento()
    // {
    //     $evento = evento::all();
    //     return redirect()->route('evento.punteroListaEvento')->with("Estos son todos los Registros");
    // }

    // // ACTUALIZAR
    // public function actualizarEvento(Request $request, $id_evento)
    // {
    //     $evento = evento::find($id_evento);

    //     $evento->nombre = $request->input('nombre');
    //     $evento->save();


    //     return redirect()->route('evento.punteroListaEvento')->with("success", "Se edito la informacion Exitosamente!");
    // }

    // // ELIMINAR
    // public function eliminarEvento($id_evento)
    // {
    //     $evento = evento::find($id_evento);
    //     $evento->delete();

    //     return redirect()->route('evento.punteroListaEvento')->with("success", "El registro se elimino");
    // }

    // crud Web
    // public function punteroListaEvento()
    // {
    //     // $text = "vista de eventos";
    //     // return $text;
    //     $eventos = evento::paginate(10);
    //     return view('Eventos.listaEvento', compact('eventos'));
    // }







    // Pagina Principal
    public function punteroListaEvento()
    {
        $eventos = evento::all();
        return view('Eventos.listaEvento', compact('eventos'));
    }













 // PunteroRegistroEquipo
 public function punteroRegistroEvento()
 {
     $eventos = Evento::all(); // Asegúrate de usar el nombre correcto del modelo Evento
     return view('Eventos.listaEvento', compact('eventos'));
 }




 // public function crearEvento(Request $request)
    // {
    //     $evento = new evento();
    //     $evento->nombre = $request->input('nombre');
    //     $evento->save();

    //     return redirect()->route('evento.punteroListaEvento')->with("success", "Se registro exitosamente");
    // }

  // Registro del Equipo
  public function registrarEvento(Request $request)
  {
      $request->validate([
          'nombre' => 'required',
      ]);

      $evento = new evento();
      $evento->nombre = $request->nombre;
      $evento->save();

      return redirect()->route('eventos.punteroListaEvento')->with('success', 'Evento registrado correctamente.');
  }



















    // Puntero Registrar Actividad
    public function punteroagregarActividad(evento $evento)

    {
        $actividades = actividade::all();
        return compact('evento', 'actividades');
    }

    // Registrar Actividad
    public function RegistrarActividad(Request $request, $eventoId)
    {
        $request->validate([
            'actividad' => 'required|exists:actividades,id_actividad',
        ]);

        $actividad = actividade::findOrFail($request->actividad);

        $evento = evento::findOrFail($eventoId);

        $evento->actividades()->attach($actividad);

        return redirect()->route('eventos.punteroListaEvento')->with('success', 'Actividad registrada correctamente.');
    }

    // Ver detalles
    public function eventoDetalles(evento $evento)
    {
        // Puedes cargar relaciones si no se han cargado automáticamente
        $evento->load('eventos', 'actividades');

        return compact('evento');
    }

    //Puntero Eliminar
    public function punteroEiminarEvento($id_evento)
    {
        return view('Eventos.modalEliminarEvento', compact('id_evento'));
    }

    // Eliminar Evento
    public function eliminarEvento($id_evento)
    {
        $evento = evento::find($id_evento); // Buscar el usuario por su ID

        if ($evento) {
            $evento->delete(); // Eliminar el usuario
            return redirect()->route('eventos.punteroListaEvento')->with("delete", "El registro se eliminó exitosamente.");
        } else {
            return redirect()->route('eventos.punteroListaEvento')->with("error", "El Equipo no se encontró o ya fue eliminado.");
        }
    }
}
