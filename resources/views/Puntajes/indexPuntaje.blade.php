@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Usuarios'])

    <div class="card custom-card">
        <h5 class="card-header">Puntajes</h5>
        <div class="card-body">
            <h5 class="card-title text-center">Registro de Puntajes</h5>

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


            {{-- obtener los datos del controlador --}}
            @php
                $actividades = \App\Models\actividade::all();
            @endphp

            {{-- Boton Crear Equipo --}}
            {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearPuntaje">
                <span class="fa-solid fa-circle-plus"></span>   Crear Puntaje
            </button>
            @include('Puntajes.modalCrearPuntaje') --}}

            {{-- Aquí comienza la tabla --}}
            <div class="row mt-4">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Actividad</th>
                                <th>Asignar Puntajes</th>
                                <th>Eliminar Puntajes</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($actividades as $actividad)
                            <tr>
                            <td>{{$actividad->id_actividad}}</td>
                            <td>{{$actividad->nombre}}</td>
                            <td>
                                <!--Botón para abrir el modal Registro de Puntaje -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#agregarPuntajeModal{{ $actividad->id_actividad }}">
                                <span class="fa-solid fa-user-pen"></span> Agregar
                            </button>

                            <div class="modal fade" id="agregarPuntajeModal{{ $actividad->id_actividad }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Puntajes</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h1> Actividad {{ $actividad->nombre }}</h1>
                                            <form id="estudianteForm{{ $actividad->id_actividad }}" method="post" action="{{ route('puntajes.almacenar-puntaje', $actividad->id_actividad) }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="nombreLugares" class="form-label">Nombre Lugar</label>
                                                    <input type="text" id="nombreLugares" name="lugares" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="nombrePuntajes" class="form-label">Puntaje</label>
                                                    <input type="number" id="nombrePuntajes" name="puntajes" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Id de la Actividad</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="actividad" value="{{$actividad->id_actividad}}" readonly>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Registrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeletePuntaje{{ $actividad->id_actividad }}">
                                    <span class="fa-solid fa-trash"></span>
                                    Eliminar
                                </button>

                                <div class="modal fade" id="confirmDeletePuntaje{{ $actividad->id_actividad }}" tabindex="-1" role="dialog" aria-labelledby="detallesEquipoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detallesEquipoModalLabel">Detalles de los Puntajes</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h1>{{ $actividad->nombre }}</h1>

                                                @if ($actividad->puntajes->count() > 0)
                                                    <p><strong>Puntajes:</strong></p>
                                                    <ul>
                                                        @foreach ($actividad->puntajes as $puntaje)
                                                            <li>{{ $puntaje->lugares }} - {{ $puntaje->puntajes }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p><strong>Puntajes:</strong> No hay puntajes asignados</p>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                                <!-- Agregamos un formulario para enviar la solicitud de eliminación -->
                                                <form action="{{ route('puntajes.eliminarPutaje', $actividad->id_actividad) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <!-- Botón para abrir el modal de detalles de Actividades y  Puntajes -->
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detallesPuntajesModal{{ $actividad->id_actividad }}">
                                <span class="fa-solid fa-circle-info"></span>
                                Detalles
                            </button>

                            <div class="modal fade" id="detallesPuntajesModal{{ $actividad->id_actividad }}" tabindex="-1" role="dialog" aria-labelledby="detallesEquipoModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detallesEquipoModalLabel">Detalles de la Actividad</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h1>{{ $actividad->nombre }}</h1>

                                            @if ($actividad->puntajes->count() > 0)
                                                <p><strong>Puntajes:</strong></p>
                                                <ul>
                                                    @foreach ($actividad->puntajes as $puntaje)
                                                        <li>{{ $puntaje->lugares }} - {{ $puntaje->puntajes }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p><strong>Puntajes:</strong> No hay puntajes asignados</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Aquí termina la tabla --}}

        </div>
    </div>



    </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection
