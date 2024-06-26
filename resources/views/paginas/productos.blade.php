@extends('layouts.layout')

@section('titulo', 'Productos')

@section('contenido')

<!-- inicio menu/slider -->
<section>

    <h1 class="menu-title">Carta De Sabores</h1>



    <!-- Inicio Modal para los detalles de un producto -->
    <aside id="myModal" class="modal">
        <div class="modal-content-menu">
            <span class="close" id="closeModalBtn">&times;</span>
            <!-- Contenido del modal -->
            <div class="ladoizq">
                <div class="traer">
                    <!-- Contenido del modal se inserta aquí dinámicamente -->
                </div>
            </div>
        </div>
    </aside>


    <!-- inicio de las cartas -->
    <div {{-- class="card__container" --}}>
        @foreach ($categorias as $categoria)
        <div class="card__container-title-category">
            <h2>{{ $categoria->nombre }}</h2>
        </div>
        <section class="container__card-productos">
            @foreach ($categoria->producto as $productoInfo)
            <article class="card__menu card__producto__historia" data-id="{{ $productoInfo->id }}">
                <div class="product">
                    <span class="like-button"><i class="fa-regular fa-heart"></i><strong>{{
                            $productoInfo->calificaciones->count() }}L</strong></span>
                    <div class="content__car__menu" id="image-container" data-modal-target="myModal">
                        <img src="{{ $productoInfo->imagen_1 }}" alt="">
                    </div>
                </div>

                <div class="content__parrafo__agregar">
                    <h2 class="parrafo-titulo">{{ $productoInfo->nombre }}</h2>
                    <p class="parrafo__cart">{{ $productoInfo->descripcion }}</p>
                </div>
                <div class="footer__card">
                    <p class="parrafo__price">$
                        <span class="text__value">
                            {{ $productoInfo->precio - ($productoInfo->precio *
                            ($productoInfo->descuento / 100)) }}
                        </span>
                    </p>
                    <div class="contenedor__acciones">
                        <div class="agregar__like like">
                            {{-- Beta --}}

                            {{-- <span class="like" href="#"><i class="fa-regular fa-heart"></i></span> --}}
                        </div>

                        <div class="agregar__carrito">
                            <span class="add-button" href="#"><i class="fa-solid fa-plus"></i></span>
                        </div>
                    </div>

                </div>

                <div class="pie__card">{{ $productoInfo->size }}</div>
            </article>
            @endforeach
        </section>
        @endforeach
    </div>
    <!-- fin cartas -->


</section>

<!--jQuery -->
<script src="{{ asset('assets/js/menuDeProductos.js') }}"></script>
<script src="{{ asset('assets/js/modalcarta.js') }}"></script>
<script src="{{ asset('assets/js/calificacion-producto.js') }}"></script>


@endsection