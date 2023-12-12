<div class="modal fade" id="modalCrearPuntaje" tabindex="-1" role="dialog" aria-labelledby="modalEquiLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalEquiLabel">Crear Nuevo Puntaje</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form  id="puntajeForm" method="post" action="{{ route('puntajes.registrarPuntaje') }}">
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
                            <label for="selectActividad" class="form-label">Actividades</label>
                            <select class="form-select" id="selectActividad" name="actividad" required>
                                <option value="" selected disabled>Selecciona la Actividad?</option>
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
        var nombreLugares = document.getElementById('nombreLugares');
        var nombrePuntajes = document.getElementById('nombrePuntajes');
        var selectActividad = document.getElementById('selectActividad');

        // Validar campos y mostrar mensajes de error si es necesario
        if (nombreLugares.value === "") {
            alert("Por favor, ingrese el Lugar que desea registrar.");
            return;
        }

        if (nombrePuntajes.value === "") {
            alert("Por favor, seleccione el puntaje que desea asignar.");
            return;
        }

        if (selectActividad.value === "") {
            alert("Por favor, seleccione la Actividad.");
            return;
        }

        // Repite el proceso para los demás campos según sea necesario
        // Si todos los campos están llenos, enviar el formulario
        document.getElementById('puntajeForm').submit();
    }
</script>
