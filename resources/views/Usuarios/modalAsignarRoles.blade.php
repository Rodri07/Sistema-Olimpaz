<!-- Contenido del formulario de asignación de roles -->
{{-- <div class="modal-header">
    <h3 class="modal-title">Asignar Roles al Usuario</h3>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form method="post" action="{{ route('usuario.guardarRoles', $item->id) }}">
        @csrf

        @foreach($roles as $role)
            <div class="form-check">
                <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                <label>{{ $role->name }}</label>
            </div>
        @endforeach
        <button type="submit">Guardar Roles</button>
    </form>
</div> --}}

{{-- <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title">Asignar Roles al Usuario</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table table_sm table-bordered text-center">
            <thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
            </thead>
            <tbody>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->firstname }}</td>
                    <td>{{ $item->email }}</td>
            </tbody>
        </table>
        <p>¿Estás seguro de que deseas eliminar a este usuario?</p>
    </div>
    <div class="modal-footer">
        <form method="post" action="{{ route('usuario.guardarRoles', $item->id) }}">
            @csrf

            @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}">
                    <label>{{ $role->name }}</label>
                </div>
            @endforeach
            <button type="submit">Guardar Roles</button>
        </form>
    </div>
</div> --}}

<div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title">Asignar Roles al Usuario</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <table class="table table-bordered text-center">
            <thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>CORREO</th>
            </thead>
            <tbody>
                <td>{{ $item->id }}</td>
                <td>{{ $item->firstname }}</td>
                <td>{{ $item->email }}</td>
            </tbody>
        </table>
        <p>¿Estás seguro de que deseas asignar roles a este usuario?</p>
    </div>
    <div class="modal-footer">
        <form method="post" action="{{route('usuario.asignarRoles', $item->id) }}">
            @csrf

            @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" class="form-check-input">
                    <label class="form-check-label">{{ $role->name }}</label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Guardar Roles</button>
        </form>
    </div>
</div>
