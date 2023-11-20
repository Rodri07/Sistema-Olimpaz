@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Facultades'])
{{-- -- Lista --}}
<div class="card custom-card">
    <h5 class="card-header"></h5>
    <div class="card-body">
        <h5 class="card-title text-center">Lista de Facultades</h5>
        <div class="row">
            <div class="col-sm-12">
                @if ($mensaje = Session::get('success'))
                    <div class="alert alert-success">
                        {{$mensaje}}
                    </div>
                @endif
            </div>
        </div>
        <p>
            <a href="{{route('facultad.punteroNuevaFacultad')}}" class="btn btn-primary">
                <span class="fa-solid fa-user-plus"></span> Crear Nueva Facultad
            </a>
        </p>

        <table class="table table_sm table-bordered text-center">
            <thead>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>Status</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </thead>
            <tbody>
                 @foreach ($facultades as $item)
                <tr>

                    <td>{{$item->id_facultad}}</td>
                    <td>{{$item->nombre}}</td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">Activo</span>
                    </td>
                    <td>
                        {{-- <form action="{{route('facultad.punteroEditarFacultad', ['id_facultad'=>$item]) }}" method="GET"> --}}
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalEditar">
                                <span class="fa-solid fa-user-pen"></span>
                            </button>

                        {{-- </form> --}}
                    </td>
                    <td>
                        <form action="{{route('facultad.punteroEliminarFacultad',['id_facultad'=>$item])}}" method="GET">
                            <button class="btn btn-danger btn-sm">
                                <span  class="fa-solid fa-user-xmark"></span>
                                <i class="bi bi-arrow-bar-right"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                {{$facultades->links()}}
            </div>
        </div>
    </div>
</div>

@include('facultades.modal');
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
