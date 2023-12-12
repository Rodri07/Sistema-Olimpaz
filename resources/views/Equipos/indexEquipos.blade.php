@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Equipos'])

    <div class="card custom-card">
        <h5 class="card-header">Equipos</h5>
        <div class="card-body">
            <h5 class="card-title text-center">Registro de Equipos</h5>

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
                $facultades = \App\Models\facultade::all();
                $carreras = \App\Models\carrera::all();
                $eventos = \App\Models\evento::all();
                $actividades = \App\Models\actividade::all();
                $puntajes = \App\Models\puntaje::all();
                $estudiantes = \App\Models\estudiante::all();
            @endphp

            {{-- Boton Crear Equipo --}}
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalEqui">
                <span class="fa-solid fa-circle-plus"></span>   Crear Equipo
            </button>
            @include('Equipos.modalCrearEquipo')

            {{-- Aquí comienza la tabla --}}
            <div class="row mt-4">
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Equipos Registrados</th>
                                <th>Asignar Participantes</th>
                                <th>Ver Estudiantes</th>
                                <th>Detalles</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipos as $equipo)
                                <tr>
                                    <td>{{ $equipo->id_equipo }}</td>
                                    <td>{{ $equipo->nombre }}</td>
                                    <td>
                                        <!--Botón para abrir el modal Registro de Estudiante -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#agregarEstudianteModal{{ $equipo->id_equipo }}">
                                            <span class="fa-solid fa-user-pen"></span> Registrar
                                        </button>

                                        <div class="modal fade" id="agregarEstudianteModal{{ $equipo->id_equipo }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Estudiante</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h1> Equipo {{ $equipo->nombre }}</h1>
                                                        <form id="estudianteForm{{ $equipo->id_equipo }}" method="post" action="{{ route('equipos.almacenar-estudiante', $equipo->id_equipo) }}">
                                                            @csrf
                                                            <label for="estudiante">Estudiante:</label>
                                                            <select name="estudiante" id="estudiante" required>
                                                                <option value="" selected disabled>Selecciona Estudiante</option>
                                                                @foreach ($estudiantes as $estudiante)
                                                                    <option value="{{ $estudiante->id_estudiante }}">{{ $estudiante->nombre }}</option>
                                                                @endforeach
                                                            </select>
                                                            <button type="submit" class="btn btn-primary">Registrar Estudiante</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            document.getElementById('estudianteForm{{ $equipo->id_equipo }}').addEventListener('submit', function(event) {
                                                // Obtener referencia al elemento select
                                                var estudianteSelect = document.getElementById('estudiante');

                                                // Validar que se haya seleccionado un estudiante
                                                if (estudianteSelect.value === "") {
                                                    alert("Por favor, selecciona un estudiante.");
                                                    event.preventDefault(); // Evitar que el formulario se envíe si la validación falla
                                                }
                                            });
                                        </script>

                                    </td>

                                    {{-- Boton Ver estudiantes --}}
                                    <td>
                                        <!-- Botón para abrir el modal de estudiantes -->
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#verEstudiantesModal{{ $equipo->id_equipo }}">
                                            <span class="fa-solid fa-circle-info"></span> Ver Estudiantes
                                        </button>

                                        <!-- Modal de estudiantes -->
                                        <div class="modal fade" id="verEstudiantesModal{{ $equipo->id_equipo }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Participantes del
                                                            Equipo {{ $equipo->nombre }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h1>Equipo {{ $equipo->nombre }}</h1>
                                                        <ol>
                                                            @foreach ($equipo->estudiantes as $estudiante)
                                                                <li>{{ $estudiante->nombre }}</li>
                                                            @endforeach
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Columna "Detalles del Equipo" -->
                                    <td>
                                        <!-- Botón para abrir el modal de detalles del equipo -->
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#detallesEquipoModal{{ $equipo->id_equipo }}">
                                            <span class="fa-solid fa-circle-info"></span>
                                            Detalles
                                        </button>

                                        <!-- Modal de Detalles del Equipo -->
                                        <div class="modal fade" id="detallesEquipoModal{{ $equipo->id_equipo }}"
                                            tabindex="-1" role="dialog" aria-labelledby="detallesEquipoModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detallesEquipoModalLabel">Detalles del
                                                            Equipo</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h1>{{ $equipo->nombre }}</h1>

                                                        @if ($equipo->facultades)
                                                            <p><strong>Facultad:</strong> {{ $equipo->facultades->nombre }}
                                                            </p>
                                                        @else
                                                            <p><strong>Facultad:</strong> No asignada</p>
                                                        @endif

                                                        @if ($equipo->carreras)
                                                            <p><strong>Carrera:</strong> {{ $equipo->carreras->nombre }}
                                                            </p>
                                                        @else
                                                            <p><strong>Carrera:</strong> No asignada</p>
                                                        @endif

                                                        @if ($equipo->eventos)
                                                            <p><strong>Evento:</strong> {{ $equipo->eventos->nombre }}</p>
                                                        @else
                                                            <p><strong>Evento:</strong> No asignada</p>
                                                        @endif

                                                        @if ($equipo->actividades)
                                                            <p><strong>Actividad:</strong>
                                                                {{ $equipo->actividades->nombre }}</p>
                                                        @else
                                                            <p><strong>Actividad:</strong> No asignada</p>
                                                        @endif


                                                        @if ($equipo->puntajes->count() > 0)
                                                            <p><strong>Puntajes:</strong></p>
                                                            <ul>
                                                                @foreach ($equipo->puntajes as $puntaje)
                                                                    <li>{{ $puntaje->lugares }} {{ $puntaje->puntajes }}
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <p><strong>Puntajes:</strong> No hay puntajes asignados</p>
                                                        @endif

                                                        @if ($equipo->estudiantes->count() > 0)
                                                            <p><strong>Estudiantes:</strong></p>
                                                            <ol>
                                                                @foreach ($equipo->estudiantes as $estudiante)
                                                                    <li>{{ $estudiante->nombre }}</li>
                                                                @endforeach
                                                            </ol>
                                                        @else
                                                            <p><strong>Estudiantes:</strong> No hay estudiantes asignados
                                                            </p>
                                                        @endif
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
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteEquipo{{ $equipo->id_equipo }}">
                                            <span  class="fa-solid fa-trash"></span>
                                            Eliminar
                                        </button>
                                        <div class="modal fade" id="confirmDeleteEquipo{{ $equipo->id_equipo }}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">

                                                    @include('Equipos.modalEliminarEquipo', ['id_equipo' => $equipo])
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- Aquí termina la tabla --}}

        </div>
    </div>

    <div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

