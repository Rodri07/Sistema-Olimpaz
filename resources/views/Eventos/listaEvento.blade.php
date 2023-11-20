@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Equipos'])

    <div class="card custom-card">
        <h5 class="card-header">Equipos</h5>
        <div class="card-body">
            <h5 class="card-title text-center">Registro de Eventos</h5>

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
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalEventos">
                <span class="fa-solid fa-circle-plus"></span>   Crear Evento

            </button>
            @include('Eventos.modalCrearEventos')

            {{-- Aquí comienza la tabla --}}
            <div class="row mt-4">
                <div class="col-sm-12">
                      {{-- tabla --}}
        <table class="table table_sm table-bordered text-center">
            <thead>
                <th>ID</th>
                <th>Eventos</th>
                <th>Actividades</th>
                <th>Detalles</th>
                <th>Eliminar</th>
            </thead>
            <tbody>
                 @foreach ($eventos as $evento)
                <tr>
                    <td>{{$evento->id_evento}}</td>
                    <td>{{$evento->nombre}}</td>

                    <td>
                        <!-- Botón para abrir el modal de agregar actividad -->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalAgregarActividad{{ $evento->id_evento }}">
                            <span class="fa-solid fa-circle-plus"></span> Agregar Actividad
                        </button>

                        <!-- Modal para agregar actividad -->
                        <div class="modal fade" id="modalAgregarActividad{{ $evento->id_evento }}" tabindex="-1" role="dialog" aria-labelledby="modalAgregarActividadLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAgregarActividadLabel">Seleccionar Actividad {{$evento->id_evento}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h1>Actividad {{ $evento->nombre }}</h1>
                                        <form method="post" action="{{ route('eventos.almacenar-actividad', $evento->id_evento) }}">
                                            @csrf
                                            <label for="actividad">Seleccionar Actividad</label>
                                            <select name="actividad" id="actividad" required>
                                                @foreach($actividades as $actividad)
                                                    <option value="{{ $actividad->id_actividad }}">{{ $actividad->nombre }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-primary"> Registrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- Columna "Detalles del Eventos" -->
                    <td>
                        <!-- Botón para abrir el modal de detalles del evento -->
                        <button type="button" class="btn btn-info" data-toggle="modal"
                            data-target="#detallesEventoModal{{ $evento->id_evento }}">
                            <span class="fa-solid fa-circle-info"></span>
                            Detalles
                        </button>

                        <!-- Modal de Detalles del Equipo -->
                        <div class="modal fade" id="detallesEventoModal{{ $evento->id_evento }}"
                            tabindex="-1" role="dialog" aria-labelledby="detallesEventoModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detallesEventoModalLabel">Detalles del
                                            Evento</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h1>{{ $evento->nombre }}</h1>

                                        <ol>
                                            @foreach ($evento->actividades as $actividad)
                                                <li>{{ $actividad->nombre }}</li>
                                            @endforeach
                                        </ol>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    {{-- Eliminar --}}
                    <td>
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteEquipo{{ $evento->id_evento }}">
                            <span  class="fa-solid fa-trash"></span>
                            Eliminar
                        </button>
                        <div class="modal fade" id="confirmDeleteEquipo{{ $evento->id_evento}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    @include('Eventos.modalEliminarEvento', ['id_evento' => $evento])
                                </div>
                            </div>
                        </div>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- fin tabla --}}
                </div>
            </div>
            {{-- Aquí termina la tabla --}}

        </div>
    </div>

    <div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
