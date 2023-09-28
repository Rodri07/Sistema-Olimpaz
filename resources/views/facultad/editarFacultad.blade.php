@extends('layouts.plantillaInicio')

@section('titulo', 'Editar Facultad')

@section('contenido')
<div class="card custom-card">
    <h5 class="card-header">FACULTADES</h5>
    <div class="card-body">
        <h5 class="card-title text-center">EDITRAR FACULTAD</h5>

        <p class="card-text">
            <form action="{{route('facultad.editarFacultad',['id_facultad'=>$facultad])}}" method="POST">
                @csrf
                @method("PUT")
                <label for="">Editar Nombre de la Facultad</label>
                <input type="text" name="nombre" class="form-control" required value="{{$facultad->nombre}}">
                <br>

                <a href="{{route('facultad.listaFacultades')}}" class="btn btn-primary">
                    <span class="fa-solid fa-rotate-left"></span> Regresar
                </a>

                <button class="btn btn-success">
                    <span class="fa-solid fa-user-plus"></span> Agregar
                </button>
            </form>
        </p>

    </div>
</div>


 <style>
        .custom-card {
    border: 2px solid #ccc; /* Borde de 2 píxeles sólido de color gris claro */
    border-radius: 10px; /* Bordes redondeados */
    padding: 10px; /* Espaciado interno */
    margin: 20px; /* Margen externo para separarlo de las esquinas */
}
 </style>
@endsection
