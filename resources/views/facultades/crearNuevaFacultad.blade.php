@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Nueva Facultad'])
    {{-- -- Nueva Facultad --}}
    <div class="card custom-card">
        <h5 class="card-header">FACULTADES</h5>
        <div class="card-body">
            <h5 class="card-title text-center">AGREGAR FACULTAD</h5>

            <p class="card-text">
            <form action="{{ route('facultad.agregarFacultad') }}" method="POST">
                @csrf
                <label for="">Nombre de la Nueva Facultad</label>
                <input type="text" name="nombre" class="form-control" required>

                <br>
                <a href="{{ route('facultad.punteroListaFacultad') }}" class="btn btn-primary">
                    <span class="fa-solid fa-rotate-left"></span> Regresar
                </a>

                <button class="btn btn-success">
                    <span class="fa-solid fa-user-plus"></span> Agregar
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
            border: 2px solid #ccc;
            /* Borde de 2 píxeles sólido de color gris claro */
            border-radius: 10px;
            /* Bordes redondeados */
            padding: 10px;
            /* Espaciado interno */
            margin: 20px;
            /* Margen externo para separarlo de las esquinas */
        }
    </style>
@endsection
