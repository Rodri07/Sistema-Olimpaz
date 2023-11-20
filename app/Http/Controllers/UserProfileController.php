<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('pages.user-profile');
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required', 'max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255']
        ]);

        auth()->user()->update([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postal' => $request->get('postal'),
            'about' => $request->get('about')
        ]);
        return back()->with('succes', 'Profile succesfully updated');
    }

    // Lista Index
    public function punteroListaUsuario()
    {
        $usuarios = User::paginate(7);
        return view('Usuarios.listaUsuario', ['usuario' => $usuarios]);
    }


    // Registrar
    public function registrarUsuario(Request $request)
    {
        $usuario = new User();
        $usuario->username = $request->post('username');
        $usuario->firstname = $request->post('firstname');
        $usuario->lastname = $request->post('lastname');
        $usuario->email = $request->post('email');
        $usuario->password = $request->post('password');
        $usuario->save();

        // asignar rol basico
        $usuario->assignRole('estudiante');

        return redirect()->route('usuario.punteroListaUsuario')->with("success", "Se Agrego Exitosamente!");
    }


    //EDITAR
    public function punteroEditarUsuario($id_usuario)
    {
        $roles = Role::all();
        return view('Usuarios.modalEditarUsuario', compact('id_usuario', 'roles'));
    }

    public function actualizarUsuario(Request $request, User $id_usuario)
    {
        // Valida y actualiza los datos del usuario
        $request->validate([
            'username' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
        ]);

        $id_usuario->update([
            'username' => $request->input('username'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('usuario.punteroListaUsuario')->with("success", "Se edito la informacion Exitosamente!");
    }

    //Eliminar
    public function punteroEiminar($id_usuario)
    {
        return view('Usuarios.modalEliminarUsuario', compact('id_usuario'));
    }

    public function eiminarUsuario($id_usuario)
    {
        $usuario = User::find($id_usuario); // Buscar el usuario por su ID

        if ($usuario) {
            $usuario->delete(); // Eliminar el usuario
            return redirect()->route('usuario.punteroListaUsuario')->with("delete", "El registro se eliminó exitosamente.");
        } else {
            return redirect()->route('usuario.punteroListaUsuario')->with("error", "El usuario no se encontró o ya fue eliminado.");
        }
    }

    // ASIGNAR ROLES
    public function punteroAsignarRoles($id_usuario)
    {
        $usuario = User::findOrFail($id_usuario);
        $rol = Role::all();
        return view('Usuarios.asignar-roles', compact('usuario', 'rol'));
    }

    public function asignarRoles(Request $request, $id_usuario)
{
    $user = User::findOrFail($id_usuario);
    $user->syncRoles($request->input('roles'));

    return redirect()->route('usuario.punteroListaUsuario')->with("success", "Roles asignados correctamente");
}

}
