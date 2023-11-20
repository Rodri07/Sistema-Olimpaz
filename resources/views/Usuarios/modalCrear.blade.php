<!-- Modal -->
<div class="modal" tabindex="-1" id="modalCrearUsuario">
    <div class="modal-dialog  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Crear Nuevo Usuario</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('usuario.registrarUsuario')}}" method="POST">
                    @csrf

                    {{-- prueba --}}
                    {{-- <div class="mb-3">
                        <label for="roles">Roles</label>
                        <select name="roles[]" id="roles" class="form-control" multiple>
                            @foreach($role as $item)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    {{-- fin --}}

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Escriba el nombre del Rol</label>
                      <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input type="text" name="firstname"  class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Apellido</label>
                        <input type="text" name="lastname" class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                      </div>
            </div>
            {{-- botones  --}}
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerra</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
            {{-- end Botones --}}
        </div>
    </div>
</div>
{{-- end modal --}}
