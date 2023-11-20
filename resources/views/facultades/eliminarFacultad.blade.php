@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
{{-- -- eliminar --}}
<div class="card custom-card">
    <h5 class="card-header">FACULTADES</h5>
    <div class="card-body">
        <h5 class="card-title text-center">ELIMINAR FACULTAD</h5>

        <p class="card-text">
           <div class="alert alert-danger" role="alert">
            <h6>Estas seguro que deseas eliminar este registro</h6>
            <table class="table table-sm table-hover table-bordered">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                </thead>
                <tbody>
                    <td>{{$facultad->id_facultad}}</td>
                    <td>{{$facultad->nombre}}</td>
                </tbody>
            </table>
           </div>
           <form action="{{route('facultad.eliminarFacultad', ['id_facultad'=>$facultad])}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('facultad.punteroListaFacultad')}}" class="btn btn-primary">
                    <span class="fa-solid fa-rotate-left"></span> Regresar
                </a>
                <button class="btn btn-danger">
                    <span class="fa-solid fa-user-xmark"></span> Eliminar
                </button>

           </form>
        </p>

    </div>
</div>


</div>
@include('layouts.footers.auth.footer')
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
