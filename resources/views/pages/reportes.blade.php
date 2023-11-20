@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Reportes'])

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            @foreach($equipos->take(3) as $index => $equipo)
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        @if($index === 0)
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Segundo Lugar</p>
                                        @elseif($index === 1)
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Tercer Lugar</p>
                                        @else
                                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Primer Lugar</p>
                                        @endif
                                        <h5 class="font-weight-bolder">
                                            {{ $equipo->nombre }}
                                        </h5>
                                        <p class="mb-0">
                                            <span class="text-success text-sm font-weight-bolder">Puntaje:</span>
                                            {{ $equipo->puntajes->sum('puntajes') }}
                                        </p>
                                    </div>
                                </div>


                                {{-- lugares --}}
                                <div class="col-4 text-end">
                                    @if($index === 0)
                                    <div class="icon icon-shape shadow-primary text-center rounded-circle d-flex align-items-center">
                                        <img src="img\segundo lugar.png" alt="Segundo Lugar" width="100" height="100">
                                    </div>
                                    @elseif($index === 1)
                                    <div class="icon icon-shape shadow-primary text-center rounded-circle d-flex align-items-center">
                                        <img src="img\Tercer Lugar.png" alt="Tercer Lugar" width="100" height="100">
                                    </div>
                                    @else
                                    <div class="icon icon-shape shadow-primary text-center rounded-circle d-flex align-items-center">
                                        <img src="img\primer lugar.png" alt="Primer Lugar" width="110" height="110">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <br><br><br><br><br>
        {{-- Reportes --}}
        <div class="container chart-container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Grafica de Puntajes</h1>
                    <canvas id="equipoChart" width="500" height="200"></canvas>
                </div>
            </div>
        </div>



    </div>

{{-- graficas de barras --}}
    <style>
        .chart-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('equipoChart').getContext('2d');

            // Definir colores para las barras
            var colors = ['rgba(144, 238, 144)', 'rgba(255, 99, 132)', 'rgba(255, 205, 86)', 'rgba(54, 162, 235)'];

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($equipos->pluck('nombre')),
                    datasets: [{
                        label: 'Puntaje Total',
                        data: @json($equipos->pluck('puntajes')->map->sum('puntajes')),
                        backgroundColor: colors,
                        borderColor: colors.map(color => color.replace('0.2', '1')),
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>




    </div>
    @include('layouts.footers.auth.footer')
    </div>
@endsection
