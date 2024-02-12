@extends('layouts.layout')

@section('titulo', 'inicio')

@section('contenido')

    {{-- importante: se debe de organizar las rutas para cada caso, es decir slider para slider y asi. --}}

    <div class="slider-container">
        <div class="slider-slide">
            @foreach ($sliders as $slider)
                <img src="{{ asset($slider->ruta) }}" alt="{{ $slider->nombre }}" class="img-slider" />
            @endforeach
        </div>
        <!-- Botones de control slider -->
        <div class="slider-controls">
            <button class="btn-prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="btn-next" onclick="changeSlide(1)">&#10095;</button>
        </div>
    </div>

    <!-- Inicio contenedor cartas o categorias -->

    <section class="card__container">

        <h1 class="titulo__categorias">
            <span class="logo-queso"><i class="fa-solid fa-cheese"></i></span>
            Categorías
        </h1>

        @foreach ($categorias as $categoria)
            <article class="card__categoria">
                <div class="header__card">
                    <img src="{{ asset($categoria->imagen) }}" alt="{{ $categoria->nombre }}">
                </div>
                <div class="boton__categoria">
                    <h2 class="titulo__articulo-categoria"><button
                            class="enlace__categoria">{{ $categoria->nombre }}</button></h2>
                </div>
            </article>
        @endforeach

    </section>

    <script src="{{ asset('assets/js/script.js') }}"></script>

@endsection
