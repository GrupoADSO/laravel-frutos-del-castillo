@extends('layouts.layout')

@section('titulo', 'Productos')

@section('contenido')

    <!-- inicio menu/slider -->
<section>

    <h1 class="menu-title">Menú</h1>
    <div class="slider">

        <button id="categoria_anterior" class="button prev"><i
                class="fa-solid fa-arrow-left"></i></button>
        <div class="word-container">
            <span id="nombre_categoria"></span>
        </div>
        <button id="categoria_siguiente" class="button next"><i
                class="fa-solid fa-arrow-right"></i></button>
    </div>

    

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
    <div class="card__container">
        {{-- productos --}}
    </div>
    <!-- fin cartas -->


</section>

    <!--jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('assets/js/menuDeProductos.js') }}"></script>
    <script src="{{ asset('assets/js/modalcarta.js') }}"></script>


@endsection