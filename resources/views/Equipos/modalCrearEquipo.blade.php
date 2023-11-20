<div class="modal fade" id="modalEqui" tabindex="-1" role="dialog" aria-labelledby="modalEquiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalEquiLabel">Crear Nuevo Equipo</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="equipoForm" method="post" action="{{ route('equipos.registrarEquipo') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombreEquipo" class="form-label">Nombre del Equipo</label>
                        <input type="text" id="nombreEquipo" name="nombre" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="selectPuntaje" class="form-label">Puntaje por defecto</label>
                            <select class="form-select" id="selectPuntaje" name="puntaje" required>
                                @foreach($puntajes as $puntaje)
                                    @if($puntaje->id_puntaje == 4)
                                        <option value="{{ $puntaje->id_puntaje }}" selected>{{ $puntaje->lugares }} {{ $puntaje->puntajes }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="selectFacultad" class="form-label">Facultades</label>
                            <select class="form-select" id="selectFacultad" name="facultad" required>
                                <option value="" selected disabled>Selecciona a la Facultad que pertenece?</option>
                                @foreach($facultades as $facultad)
                                    <option value="{{ $facultad->id_facultad }}">{{ $facultad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="selectCarrera" class="form-label">Carrera</label>
                            <select class="form-select" id="selectCarrera" name="carrera">
                                <option value="" selected disabled>Selecciona la Carrera</option>
                                @foreach($carreras as $carrera)
                                    <option value="{{ $carrera->id_carrera }}">{{ $carrera->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="selectEvento" class="form-label">Evento</label>
                            <select class="form-select" id="selectEvento" name="evento">
                                <option value="" selected disabled>Selecciona el evento al que pertenece</option>
                                @foreach($eventos as $evento)
                                    <option value="{{ $evento->id_evento }}">{{ $evento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="selectActividade" class="form-label">Actividad</label>
                            <select class="form-select" id="selectActividade" name="actividade">
                                <option value="" selected disabled>Selecciona la actividad a la que pertenece</option>
                                @foreach($actividades as $actividad)
                                    <option value="{{ $actividad->id_actividad }}">{{ $actividad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerra</button>
                <button type="button" class="btn btn-primary" onclick="validarFormulario()">Registrar</button>
            </div>
        </form>
        </div>
    </div>
</div>


<script>
    function validarFormulario() {
        // Obtener referencias a los elementos del formulario
        var nombreEquipo = document.getElementById('nombreEquipo');
        var selectPuntaje = document.getElementById('selectPuntaje');
        var selectFacultad = document.getElementById('selectFacultad');
        var selectCarrera = document.getElementById('selectCarrera');
        var selectEvento = document.getElementById('selectEvento');
        var selectActividade = document.getElementById('selectActividade');

        // Validar campos y mostrar mensajes de error si es necesario
        if (nombreEquipo.value === "") {
            alert("Por favor, ingrese el nombre del equipo.");
            return;
        }

        if (selectPuntaje.value === "") {
            alert("Por favor, seleccione el puntaje por defecto.");
            return;
        }

        if (selectFacultad.value === "") {
            alert("Por favor, seleccione la facultad.");
            return;
        }

        if (selectCarrera.value === "") {
            alert("Por favor, seleccione la Carrera.");
            return;
        }

        if (selectEvento.value === "") {
            alert("Por favor, seleccione la Evento.");
            return;
        }

        if (selectActividade.value === "") {
            alert("Por favor, seleccione la Actividad.");
            return;
        }

        // Repite el proceso para los demás campos según sea necesario

        // Si todos los campos están llenos, enviar el formulario
        document.getElementById('equipoForm').submit();
    }
</script>


