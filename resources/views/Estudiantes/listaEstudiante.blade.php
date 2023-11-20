@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Estudiantes'])

<div class="card custom-card">
    <h5 class="card-header"></h5>
    <div class="card-body">
        <h5 class="card-title text-center">Lista de Estudiantes</h5>
        <div class="row">
            {{-- alertas --}}
            <div class="col-sm-12">
                @if ($mensaje = Session::get('success'))
                    <div class="alert alert-success">
                        {{$mensaje}}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @if ($mensaje = Session::get('delete'))
                    <div class="alert alert-warning">
                        {{$mensaje}}
                    </div>
                @endif
            </div>
        </div>
        {{-- fin  --}}

        {{-- crear Estudiante --}}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearEstudiantes">
        Crear nuevo Estudiante
        </button>

        @include('Estudiantes.modalCrearEstudiante')

        {{-- fin Estudiantes --}}

        {{-- tabla --}}
        <table class="table table_sm table-bordered text-center">
            <thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO_P</th>
                <th>APELLIDO_M</th>
                <th>STATUS</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </thead>
            <tbody>
                 @foreach ($estudiante as $item)
                <tr>
                    <td>{{$item->id_estudiante}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->apellido_p}}</td>
                    <td>{{$item->apellido_m}}</td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">inscrito</span>
                    </td>
                    {{-- editar --}}
                    <td>
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editUserModal{{ $item->id }}">+
                            <span class="fa-solid fa-user-pen"></span>
                        </button>
                        <div class="modal fade" id="editUserModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    @include('Estudiantes.modalEditarEstudiante', ['id_estudiante' => $item])
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
                                    @include('Estudiantes.modalEliminarEstudiante', ['id_estudiante' => $item])
                                </div>
                            </div>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- fin tabla --}}

        <hr>
        <div class="row">
            <div class="col-sm-12">
                {{$estudiante->links()}}
            </div>
        </div>
    </div>
</div>

{{-- Modales --}}
{{-- @include('Estudiantes.modalEditarEstudiate') --}}
</div>
@include('layouts.footers.auth.footer')
</div>
@endsection

