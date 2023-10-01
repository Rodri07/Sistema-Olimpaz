@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    {{-- Seccion de puntajes --}}
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">puntajes de hoy</p>
                                    <h5 class="font-weight-bolder">
                                        5000
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+55%</span>
                                        since yesterday
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
                                    <h5 class="font-weight-bolder">
                                        2,300
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+3%</span>
                                        since last week
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">New2 Clients</p>
                                    <h5 class="font-weight-bolder">
                                        +3,462
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                        since last quarter
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                                    <h5 class="font-weight-bolder">
                                        $103,430
                                    </h5>
                                    <p class="mb-0">
                                        <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{-- Registro de estudiantes --}}
    <div class="row mt-4">
        <div class="{{-- col-lg-7 mb-lg-0 mb-4 --}}">
            <div class="card z-index-2 h-100">
                <div class="card-body p-3">
                    <div class="chart">
                        <form action="{{route('home')}}" method="POST">
                            @csrf
                            <fieldset>
                                <legend>Registro del estudiante</legend>
                                <div class="row">
                                    <div class="col-sm-12">
                                        @if ($mensaje = Session::get('success'))
                                            <div class="alert alert-success">
                                                {{$mensaje}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre">
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Apellido Paterno</label>
                                    <input type="text" name="apellido_p" class="form-control" placeholder="Apellido">
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Apellido Materno </label>
                                    <input type="text" name="apellido_m" class="form-control" placeholder="Apellido">
                                </div>
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">ID de carrera </label>
                                    <input type="number" name="id_carrera" class="form-control" placeholder="Numero de Carrera">
                                </div>
                                <div class="mb-3">
                                    <label for="carrera" class="form-label">Seleccione su carrera</label>
                                    <select class="form-select form-select-sm" aria-label="Small select example">
                                        <option selected>Seleccione su carrera</option>
                                        <option value="1">Sistemas</option>
                                        <option value="2">Ambiental</option>
                                        <option value="3">Telecomunicaciones</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <span class="fa-solid fa-share"></span> Enviar
                                </button>
                            </fieldset>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- lista estudiante --}}

    <div class="row mt-4">
        <div class="col-12">
            <div class="card border p-3">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-2">Lista de estudiantes</h6>
                    </div>
                </div>

                <div class="table-responsive">

                    <div class="table-responsive">
                        <table class="table table_sm text-center">
                            <thead>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Status</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @foreach ($estudiante as $item)
                                <tr>
                                    <td>{{$item->id_estudiante}}</td>
                                    <td>{{$item->nombre}}</td>
                                    <td>{{$item->apellido_p}}</td>
                                    <td>{{$item->apellido_m}}</td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Incrito</span>
                                    </td>
                                    <td>
                                        <form action="{{-- route('facultad.punteroEditarFacultad', ['id_facultad'=>$item]) --}}" method="GET">
                                            <button class="btn btn-warning btn-sm">
                                                <span class="fa-solid fa-user-pen"></span>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{--route('facultad.punteroEliminarFacultad',['id_facultad'=>$item])--}}" method="GET">
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
                            {{$estudiante->links()}}
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end --}}

</div>
     </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection

@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#fb6340",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
