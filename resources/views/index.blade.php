@extends('layouts.layout')


@section('titulo', 'inicio')

@section('contenido')

    <!-- contenedor del slider -->
    <main class="slider-container">
        <!-- Contenedor imagen slider -->
        <div class="slider-slide">
            <img src="./img/img-slider/pexels-dana-tentis-1213710 (1).jpg" alt="Imagen 1" />
        </div>

        <!-- Contenedor imagen slider -->
        <div class="slider-slide">
            <img src="./img/img-slider/pexels-naim-benjelloun-2110923.jpg" alt="Imagen 2" />
        </div>

        <!-- Contenedor imagen slider -->
        <div class="slider-slide">
            <img src="./img/img-slider/pexels-valeria-boltneva-1251198 (5).jpg" alt="Imagen 3" />
        </div>

        <!-- Botones de control slider -->
        <div class="slider-controls">
            <button class="btn-prev" onclick="changeSlide(-1)">&#10094;</button>
            <button class="btn-next" onclick="changeSlide(1)">&#10095;</button>
        </div>
    </main>

    <!-- fin contenedor principal -->

    <!-- Inicio contenedor cartas o categorias -->


    <section class="section-cart">

        <div class="header-titulo-categoria">
            <!-- <div class="title-container"> -->
            <img src="./img/img-cartas/logo-menu.png" alt="Logo de queso rojo" class="logo__queso" />
            <h1 class="title">Categorías</h1>
            <!-- </div> -->
        </div>

        <div class="card-container-categorias">
            <div class="card__categorias">
                <img src="img/img-cartas/pexels-rajesh-tp-1633578.jpg" alt="Imagen 1" />
                <button class="button__categorias ">Comidas rapidas</button>
            </div>

            <div class="card__categorias">
                <img src="img/img-cartas/pexels-anna-tukhfatullina-food-photographerstylist-2638026.jpg" alt="Imagen 2" />
                <button class="button__categorias">Postres</button>
            </div>

            <div class="card__categorias">
                <img src="img/img-cartas/pexels-streetwindy-4055138 (1).jpg" alt="Imagen 3" />
                <button class="button__categorias">Bebidas</button>
            </div>

            <div class="card__categorias">
                <img src="img/img-cartas/pexels-marta-dzedyshko-7441761.jpg" alt="Imagen 4">
                <button class="button__categorias">Extra</button>
            </div>
        </div>
    </section>

    <!-- Fin contenedor cartas o categorias -->
@endsection
