<?php

namespace App\Http\Controllers;

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
       public function lista()
       {
           $facultades = facultade::paginate(4);
           return view('pages.lista', ['facultades'=>$facultades]);
       }





     public function index()
    {
        $estudiantes = estudiante::paginate(4);
        return view('pages.dashboard', ['estudiante'=>$estudiantes]);
    }

      // Metodo paraa agregar el nuevo estudiante nuevo
      public function agregarEstudiante(Request $request)
      {
          //print_r($_POST);
          $estudiantes = new estudiante();
          $estudiantes->nombre = $request->post('nombre');
          $estudiantes->apellido_p = $request->post('apellido_p');
          $estudiantes->apellido_m = $request->post('apellido_m');
          $estudiantes->id_carrera = $request->post('id_carrera');
          $estudiantes->save();
          return Redirect()->route("home")->with("success", "Se Agrego Exitosamente!");
      }


      // editar
       // 3 Metodo para mostrar el formulario para editar la faculdad
    public function punteroEditarFacultad($id_estudiante)
    {
        //echo $id_facultad; prueba si se evia en id
        $estudiantes = estudiante::find($id_estudiante);
        return view('facultad.editarFacultad', compact('estudiantes'));
    }




}
