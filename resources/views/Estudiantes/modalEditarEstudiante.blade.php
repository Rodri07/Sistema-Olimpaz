{{-- Modal Modificar --}}
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Editar Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{ route('estudiante.actualizarEstudiante', $item->id_estudiante) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="nombre" value="{{ $item->nombre }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputLastName" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="exampleInputLastName" aria-describedby="emailHelp" name="apellido_p" value="{{ $item->apellido_p }}">
             </div>
            <div class="mb-3">
                <label for="exampleInputLastName" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="exampleInputLastName" aria-describedby="emailHelp" name="apellido_m" value="{{ $item->apellido_m }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputCarrera" class="form-label">ID de Carrera</label>
                <input type="text" class="form-control" id="exampleInputCarrera" aria-describedby="emailHelp" name="id_carrera" value="{{ $item->id_carrera }}">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
        </form>
    </div>
</div>
{{-- fin Modal --}}

