<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Confirmar Eliminación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table table_sm table-bordered text-center">
            <thead>
                <th>ID</th>
                <th>Equipo</th>
            </thead>
            <tbody>
                    <td>{{ $equipo->id_equipo }}</td>
                    <td>{{ $equipo->nombre }}</td>
            </tbody>
        </table>
        <p>¿Estás seguro de que deseas eliminar a este Equipo?</p>
    </div>
    <div class="modal-footer">
        <form method="post" action="{{ route('equipos.eliminarEquipo', $equipo->id_equipo) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
    </div>
</div>
