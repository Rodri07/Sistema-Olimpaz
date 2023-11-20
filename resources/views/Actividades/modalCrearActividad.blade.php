<!-- Modal para Crear Nueva Actividad -->
<div class="modal" tabindex="-1" id="modalCrearActividad">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Crear Nueva Actividad</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('actividades.crearActividad') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la Actividad</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                </div>
                {{-- Botones --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Registrar Actividad</button>
                </div>
            </form>
            {{-- Fin de Botones --}}
        </div>
    </div>
</div>
