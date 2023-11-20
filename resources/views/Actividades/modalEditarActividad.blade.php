<!-- Modal Modificar Actividad -->
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Editar Actividad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{ route('actividades.actualizarActividad', $actividad->id_actividad) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputNombre" class="form-label">Nombre de la Actividad</label>
                <input type="text" class="form-control" id="exampleInputNombre" aria-describedby="emailHelp" name="nombre" value="{{ $actividad->nombre }}">
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
        </form>
    </div>
</div>
