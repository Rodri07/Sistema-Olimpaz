@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Actividades'])

<div class="card custom-card">
    <h5 class="card-header"></h5>
    <div class="card-body">
        <h3 class="card-title text-center">ACTIVIADES</h3>

         {{-- alertas --}}
         <div class="row">
            {{-- alertas --}}
            <div class="col-sm-12">
                @if ($mensaje = Session::get('success'))
                    <div id="alert-success" class="alert alert-success">
                        {{$mensaje}}
                    </div>
                @endif

                @if ($mensaje = Session::get('delete'))
                    <div id="alert-delete" class="alert alert-danger">
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

        {{-- crear actividad --}}
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCrearActividad">
            Crear nueva Actividad
        </button>
        @include('Actividades.modalCrearActividad')

        {{-- tabla --}}
        <table class="table table-sm table-bordered text-center">
            <thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
                @foreach ($actividades as $actividad)
                    <tr>
                        <td>{{$actividad->id_actividad}}</td>
                        <td>{{$actividad->nombre}}</td>
                        <td>
                            {{-- Editar --}}
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editActividadModal{{ $actividad->id_actividad }}">
                                <span class="fa-solid fa-pen"></span>
                            </button>
                            <div class="modal fade" id="editActividadModal{{ $actividad->id_actividad }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('Actividades.modalEditarActividad', ['id_actividad' => $actividad])
                                    </div>
                                </div>
                            </div>
                        </td>


                        <td>
                            {{-- eliminar --}}
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal_{{ $actividad->id_actividad }}">
                                <span  class="fa-solid fa-trash"></span>
                            </button>
                            <div class="modal fade" id="confirmDeleteModal_{{ $actividad->id_actividad }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        @include('Actividades.modalEliminarActividad', ['id_actividad' => $actividad])
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
                {{ $actividades->links() }}
            </div>
        </div>

        {{-- Modales --}}
        @foreach ($actividades as $item)
            <div class="modal fade" id="editActividadModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="editActividadModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        @include('Actividades.modalEditarActividad', ['actividad' => $item])
                    </div>
                </div>
            </div>

            <div class="modal fade" id="confirmDeleteModal_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        @include('Actividades.modalEliminarActividad', ['actividad' => $item])
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- Resto de tu vista --}}

<div>
    @include('layouts.footers.auth.footer')
</div>
@endsection
