<?php

namespace App\Http\Controllers;

use App\Models\facultade;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FacultadeController extends Controller
{

    // CRUD RUTAS CON API

    //1  Metodo para listar las facultades
    public function listaFacultades()
    {
        // web
        // $facultades = facultade::paginate(4);
        // return view('facultad.listaFacultades', ['facultad'=>$facultades]);
        //Api
        $facultades = facultade::all();
        return response()->json($facultades);
    }

  //2 Metodo paraa agregar fucultad nueva
  public function agregarFacultad(Request $request)
  {
    // WEB
    //print_r($_POST);
    // $facultad = new facultade();
    // $facultad->nombre = $request->post('nombre');
    // $facultad->save();
    // return Redirect()->route("facultad.listaFacultades")->with("success", "Se Agrego Exitosamente!");

    // API
    $datosTabla = $request->all();

    $facultades = new facultade();
    $facultades->id_facultad = $datosTabla['id_facultad'];
    $facultades->nombre = $datosTabla['nombre'];
    $facultades->save();
    return response()->json($facultades);
  }

     //3 Metodo par actualizar la facultad
     public function editarFacultad(Request $request, $id_facultad)
     {
         //  WEB
         // $facultad = facultade::find($id_facultad);
         // $facultad->nombre = $request->post('nombre');
         // $facultad->save();
         // return redirect()->route('facultad.listaFacultades')->with("success", "Se edito la informacion Exitosamente!");

         // API
        $facultades = facultade::find($id_facultad);
        $facultades->nombre = $request->nombre;
        $facultades->save();
        return response()->json(['message'=>"El registro se Actualizo"]);
     }


    // PUNTEROS

    // 2 Metodo para mostrar el formulario para crear una nueva facultad
    public function punteroCrearFacultad()
    {   // Web
        //return view('facultad.crearFacultad');
        //Api
        $texto = "Direccionamiento exitoso";
        return response()->json($texto);
    }

    // 3 Metodo para mostrar el formulario para editar la faculdad
    public function punteroEditarFacultad($id_facultad)
    {
        //echo $id_facultad; prueba si se evia en id
        $facultad = facultade::find($id_facultad);
        return view('facultad.editarFacultad', compact('facultad'));
    }

    // 4 metodo par mostrar el dato que se desea eliminar
    public function punteroEliminarFacultad($id_facultad)
    {
        $facultad = facultade::find($id_facultad);
        return view('facultad.eliminarFacultad', compact('facultad'));
    }

    // Metodo para eliminar una facultad
    public function eliminarFacultad($id_facultad)
    {
        //print_r($id_facultad);
        $facultad = facultade::find($id_facultad);
        $facultad->delete();

        return redirect()->route('facultad.listaFacultades')->with("success", "Se elimino la informacion Exitosamente!");
    }
}
