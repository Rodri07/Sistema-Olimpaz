<!-- Modal -->
<div class="modal" tabindex="-1" id="modalCrearEstudiantes">
    <div class="modal-dialog  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Crear Nuevo Estudiante</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('estudiante.registrarEstudiante') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputNombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                     </div>
                    <div class="mb-3">
                        <label for="exampleInputApellidoPaterno" class="form-label">Apellido Paterno</label>
                        <input type="text" name="apellido_p" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputApellidoMaterno" class="form-label">Apellido Materno</label>
                        <input type="text" name="apellido_m" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputIdCarrera" class="form-label">ID de Carrera</label>
                        <input type="text" name="id_carrera" class="form-control" required>
                    </div>
            </div>
            {{-- botones  --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary"data-bs-dismiss="modal">Registrar</button>
            </div>
        </form>
        {{-- end Botones --}}
        </div>
    </div>
</div>
{{-- end modal --}}
