@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Iniciar Sesión</h4>
                                    <p class="mb-0">Ingresa tu correo electrónico y contraseña para iniciar sesión</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="POST" action="{{ route('login.perform') }}">
                                        @csrf
                                        @method('post')
                                        <div class="flex flex-col mb-3">
                                            {{-- <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') ?? 'admin@argon.com' }}" aria-label="Email"> --}}
                                            <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') ?? 'olimpaz@uab.com' }}" aria-label="Email">
                                            @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="flex flex-col mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg" aria-label="Password" value="secret" >
                                            @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Acuerdate de mi</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0" style="background-color: blue;">Iniciar Sesión</button>
                                        </div>
                                    </form>
                                </div>
                                {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-1 text-sm mx-auto">
                                        ¿Olvidaste tu contraseña? Restablecer tu contraseña
                                        <a href="{{ route('reset-password') }}" class="text-primary text-gradient font-weight-bold">aquí</a>
                                    </p>
                                </div> --}}
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        ¿No tienes una cuenta?
                                        <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Registrarse</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('https://www.uab.edu.bo/wp-content/uploads/2022/03/DSC_1712.jpg'); background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">"SISTEMA DE GESTION DEL OLIMPAZ"</h4>
                                <p class="text-white position-relative">Actividades realizadas por la Universidad Abventista de Bolivia</p>
                            </div>
                        </div> --}}

                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute bottom-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden">
                                <!-- Agregar la imagen como fondo -->
                                <img src="\img\University.jpg" alt="Imagen de fondo" style="width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: -1;">

                                <!-- Contenedor para etiquetas -->
                                <div class="text-container position-absolute bottom-0 end-0 w-100 text-white">
                                    <span class="mask bg-gradient-primary opacity-6"></span>
                                    <h4 class="mt-5 text-white font-weight-bolder position-relative">"SISTEMA DE GESTION DEL OLIMPAZ"</h4>
                                    <p class="text-white position-relative">Actividades realizadas por la Universidad Adventista de Bolivia</p>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
