@extends('layouts.plantillaInicio')

@section('titulo', 'lista de facultades')

@section('contenido')
<div class="card custom-card">
        <h5 class="card-header">FACULTADES</h5>
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
                <a href="{{route('facultad.punteroCrearFacultad')}}" class="btn btn-primary">
                    <span class="fa-solid fa-user-plus"></span> Crear Nueva Facultad
                </a>
            </p>

            <table class="table table_sm table-bordered text-center">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                </thead>
                <tbody>
                    @foreach ($facultad as $item)
                    <tr>
                        <td>{{$item->id_facultad}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>
                            <form action="{{ route('facultad.punteroEditarFacultad', ['id_facultad'=>$item]) }}" method="GET">
                                <button class="btn btn-warning btn-sm">
                                    <span class="fa-solid fa-user-pen"></span>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('facultad.punteroEliminarFacultad',['id_facultad'=>$item])}}" method="GET">
                                <button class="btn btn-danger btn-sm">
                                    <span class="fa-solid fa-user-xmark"></span>
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
                    {{$facultad->links()}}
                </div>
            </div>
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
