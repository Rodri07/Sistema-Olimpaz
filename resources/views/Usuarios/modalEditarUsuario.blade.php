{{-- Modal Modificar --}}
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
            <div class="modal-body">
                <form method="post" action="{{route('usuario.actualizarUsuario', $item->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Id del Usuario</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" value="{{$item->id}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Rol</label> <!-- Cambiado el atributo "for" para que coincida con el "id" del input -->
                        <input type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" name="username" value="{{$item->username}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Nombre</label> <!-- Cambiado el atributo "for" para que coincida con el "id" del input -->
                        <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="firstname" value="{{$item->firstname}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLastName" class="form-label">Apellido</label> <!-- Cambiado el atributo "for" para que coincida con el "id" del input -->
                        <input type="text" class="form-control" id="exampleInputLastName" aria-describedby="emailHelp" name="lastname" value="{{$item->lastname}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLastName" class="form-label">Correo</label> <!-- Cambiado el atributo "for" para que coincida con el "id" del input -->
                        <input type="text" class="form-control" id="exampleInputLastName" aria-describedby="emailHelp" name="email" value="{{$item->email}}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modificar</button>
                    </div>
                </form>
            </div>
        </div>
{{-- fin Modal --}}
