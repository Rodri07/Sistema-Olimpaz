<?php

namespace App\Http\Controllers;

use App\Models\facultade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FacultadeController extends Controller
{
    //1  Metodo mostrar lista de facultades
    public function listaFacultades()
    {
        $facultades = facultade::paginate(4);
        return view('facultad.listaFacultades', ['facultad'=>$facultades]);
    }


    // 2 Metodo para mostrar el formulario para crear una nueva facultad
    public function punteroCrearFacultad()
    {
        return view('facultad.crearFacultad');
    }

    // Metodo paraa agregar la fucultad nueva
    public function agregarFacultad(Request $request)
    {
        //print_r($_POST);
        $facultad = new facultade();
        $facultad->nombre = $request->post('nombre');
        $facultad->save();

        return Redirect()->route("facultad.listaFacultades")->with("success", "Se Agrego Exitosamente!");
    }

    // 3 Metodo para mostrar el formulario para editar la faculdad
    public function punteroEditarFacultad($id_facultad)
    {
        //echo $id_facultad; prueba si se evia en id
        $facultad = facultade::find($id_facultad);
        return view('facultad.editarFacultad', compact('facultad'));
    }

    //Metodo par editar la facultad
    public function editarFacultad(Request $request, $id_facultad)
    {
        $facultad = facultade::find($id_facultad);
        $facultad->nombre = $request->post('nombre');
        $facultad->save();

        return redirect()->route('facultad.listaFacultades')->with("success", "Se edito la informacion Exitosamente!");
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
