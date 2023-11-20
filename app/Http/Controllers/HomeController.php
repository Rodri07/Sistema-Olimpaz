<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use App\Models\equipo;
use App\Models\estudiante;
use App\Models\facultade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
       // Metodo para mostar tu archivo blade
    //    public function punteroListaFacultad()
    //    {
    //        $facultades = facultade::paginate(4);
    //        return view('facultades.listafacultad', ['facultades'=>$facultades]);
    //    }

    //  public function index()
    // {
    //     $estudiantes = estudiante::paginate(4);
    //     $carrera = carrera::all();
    //     return view('pages.dashboard', ['estudiante'=>$estudiantes, 'carrera'=>$carrera]);
    // }

      // Metodo paraa agregar el nuevo estudiante nuevo
      public function agregarEstudiante(Request $request)
      {
          //print_r($_POST);
          $estudiantes = new estudiante();
          $estudiantes->nombre = $request->post('nombre');
          $estudiantes->apellido_p = $request->post('apellido_p');
          $estudiantes->apellido_m = $request->post('apellido_m');
          $estudiantes->id_carrera = $request->post('carreraid');
          $estudiantes->save();
          return Redirect()->route("home")->with("success", "Se Agrego Exitosamente!");
      }


      // editar
       // 3 Metodo para mostrar el formulario para editar la faculdad
    // public function punteroEditarFacultad($id_estudiante)
    // {
    //     //echo $id_facultad; prueba si se evia en id
    //     $estudiantes = estudiante::find($id_estudiante);
    //     $carrera = carrera::all();
    //     return view('facultad.editarFacultad', compact('estudiantes'));
    // }




    // public function pruebaReportes()
    // {
    //     // $equipos = equipo::with('puntajes')->get();
    //     // return view('pages.pruebaR', compact('equipos'));

    //     $equipos = equipo::with('puntajes')
    //     ->get()
    //     ->sortByDesc(function ($equipo) {
    //         return $equipo->puntajes->sum('puntajes');
    //     })
    //     ->take(3);

    // return view('pages.pruebaR', compact('equipos'));

    // }


    public function pruebaReportes()
    {
        $equipos = equipo::with('puntajes')
            ->get()
            ->sortByDesc(function ($equipo) {
                return $equipo->puntajes->sum('puntajes');
            })
            ->take(3);

    return view('pages.reportes', compact('equipos'));

    }

}
