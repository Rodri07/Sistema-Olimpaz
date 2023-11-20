<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// rutas spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        /*
            Admin = tener acceso a todo el sitio web
            User = es ver todo el contenido del sistema
         */

        $admin = Role::create(['name'=>'Admin']);
        $docente = Role::create(['name'=>'Docente']);
        $PresiEstudiante = Role::create(['name'=>'PresiEstudiante']);
        $estudiante = Role::create(['name'=>'estudiante']);


        //Permission::create(['name'=>'dashboard'])->syncRoles([$admin, $user]);


        // Permiso de Perfil
        Permission::create(['name'=>'profile-static'])->syncRoles([$admin, $docente, $PresiEstudiante, $estudiante ]);

        //Permisos de Usuarios
        Permission::create(['name'=>'usuario.punteroListaUsuario'])->assignRole($admin);
        Permission::create(['name'=>'usuario.registrarUsuario'])->assignRole($admin);
        Permission::create(['name'=>'usuario.punteroEditarUsuario'])->assignRole($admin);
        Permission::create(['name'=>'usuario.actualizarUsuario'])->assignRole($admin);
        Permission::create(['name'=>'usuario.punteroEiminar'])->assignRole($admin);
        Permission::create(['name'=>'usuario.eiminarUsuario'])->assignRole($admin);
        Permission::create(['name'=>'usuario.punteroAsignarRoles'])->assignRole($admin);
        Permission::create(['name'=>'usuario.asignarRoles'])->assignRole($admin);

        //Permisos de Facultad
        Permission::create(['name'=>'facultad.punteroListaFacultad'])->assignRole($admin);
        Permission::create(['name'=>'facultad.punteroNuevaFacultad'])->assignRole($admin);
        Permission::create(['name'=>'facultad.agregarFacultad'])->assignRole($admin);
        Permission::create(['name'=>'facultad.punteroEditarFacultad'])->assignRole($admin);
        Permission::create(['name'=>'facultad.editarFacultad'])->assignRole($admin);
        Permission::create(['name'=>'facultad.punteroEliminarFacultad'])->assignRole($admin);
        Permission::create(['name'=>'facultad.eliminarFacultad'])->assignRole($admin);

        //Permisos de Eventos

        //Permisos de Actividades

        //Permisos de Equipos

        //Permisos de Reportes


    }
}

