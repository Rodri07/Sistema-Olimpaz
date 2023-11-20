<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Confirmar Eliminación de Estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table table_sm table-bordered text-center">
            <thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO PATERNO</th>
                <th>APELLIDO MATERNO</th>
                <th>ID DE CARRERA</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $item->id_estudiante }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->apellido_p }}</td>
                    <td>{{ $item->apellido_m }}</td>
                    <td>{{ $item->id_carrera }}</td>
                 </tr>
            </tbody>
        </table>
        <p>¿Estás seguro de que deseas eliminar a este estudiante?</p>
    </div>
    <div class="modal-footer">
        <form method="post" action="{{ route('estudiante.eliminarEstudiante', $item->id_estudiante) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    </div>
</div>
