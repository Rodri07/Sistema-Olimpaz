@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Usuarios'])

<div class="card custom-card">
    <h5 class="card-header"></h5>
    <div class="card-body">
        <h5 class="card-title text-center">Lista de Usuarios</h5>
        <div class="row">
            {{-- alertas --}}
            <div class="col-sm-12">
                @if ($mensaje = Session::get('success'))
                    <div id="alert-success" class="alert alert-success">
                        {{$mensaje}}
                    </div>
                @endif

                @if ($mensaje = Session::get('delete'))
                    <div id="alert-delete" class="alert alert-warning">
                        {{$mensaje}}
                    </div>
                @endif
            </div>
        </div>

        <script>
            $(document).ready(function() {
                // Ocultar ambas alertas después de 5 segundos (5000 milisegundos)
                $("#alert-success, #alert-delete").fadeTo(5000, 0).slideUp(500, function(){
                    $(this).remove();
                });
            });
        </script>
        {{-- fin  --}}

        {{-- crear usuario --}}
        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalCrearUsuario">
            <span class="fa-solid fa-user-pen"></span> Crear Nuevo Usuario
        </button>
        @include('Usuarios.modalCrear')

        {{-- fin usuario --}}

        {{-- tabla --}}
        <table class="table table_sm table-bordered text-center">
            <thead>
                <th>ID</th>
                <th>ROLES</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
                <th>STATUS</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
                <th>ROLES</th>
            </thead>
            <tbody>
                 @foreach ($usuario as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->firstname}}</td>
                    <td>{{$item->email}}</td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Activo</span>
                    </td>
                    {{-- editar --}}
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editUserModal{{ $item->id }}">+
                            <span class="fa-solid fa-user-pen"></span>
                        </button>
                        <div class="modal fade" id="editUserModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    @include('Usuarios.modalEditarUsuario', ['id_usuario' => $item])
                                </div>
                            </div>
                        </div>
                    </td>
                    {{-- eliminar --}}
                    <td>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal_{{ $item->id }}">
                            <span  class="fa-solid fa-user-xmark"></span>
                            <i class="bi bi-arrow-bar-right"></i>
                        </button>
                        <div class="modal fade" id="confirmDeleteModal_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    @include('Usuarios.modalEliminarUsuario', ['id_usuario' => $item])
                                </div>
                            </div>
                        </div>
                    </td>

                    {{-- roles --}}
                    <td>
                        @php
                        $roles = \App\Models\Role::all(); // Reemplaza esto con la forma en que obtienes tus roles
                    @endphp

                        {{-- crear Rol --}}
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalRol">
                            Asignar Roles
                        </button>

                        <div class="modal fade" id="modalRol" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    @include('Usuarios.modalAsignarRoles')
                                </div>
                            </div>
                        </div>
                    </td>


                    {{-- <td>
                        <a class="btn btn-success btn-sm" href="{{ route('usuario.asignarRoles', $item->id) }}">
                            Asignar Roles
                        </a>
                    </td> --}}



                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- fin tabla --}}

        <hr>
        <div class="row">
            <div class="col-sm-12">
                {{$usuario->links()}}
            </div>
        </div>
    </div>
</div>

{{-- Modales --}}
{{-- @include('Usuarios.modalEditarUsuario') --}}
</div>
@include('layouts.footers.auth.footer')
</div>
@endsection

