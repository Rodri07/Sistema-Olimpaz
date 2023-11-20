{{-- Modal Modificar Evento --}}
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Editar Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form method="post" action="{{ route('evento.editarEvento', $evento->id_evento) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="nombre" value="{{ $evento->nombre }}">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Modificar</button>
            </div>
        </form>
    </div>
</div>
{{-- Fin Modal --}}
