@extends('layouts.layout')



@section('titulo', 'perfil')

@section('contenido')

@if (session('usuarioEditado'))
<div class="alerta__usuario__creado">
    <h1 class="mensaje__alerta" id="mensajeAlertaUsuarioCreado">{{ session('usuarioEditado') }} <i
            class="bi bi-check2-square"></i></h1>
</div>
@endif

    <!-- inicio editar perfil -->

    <aside id="modal-dos" class="custom-modal">
        <div class="custom-modal-content">
            <span class="custom-close"><i class="fa-solid fa-xmark"></i></span>

            <form action="{{ route('editar-perfil', $usuario->id) }}" class="form__control__perfil-dos" method="POST">
                @csrf
                <div class="form__container-dos">
                    <i class="fa-solid fa-user form__title-dos"></i>

                    <div class="form__group-dos">
                        <i class="fa-solid fa-user "></i>
                        <input type="text" name="nombre" class="form__input-dos" value="{{ $usuario->nombre }}">
                        @if ($errors->has('nombre'))
                        <div></div>
                            <small class="alerta__color-rojo "><i class=" alert a-tamaño fa-solid fa-circle-exclamation "></i>
                                Solo letras</small>
                        @endif
                    </div>

                    <div class="form__group-dos">
                        <i class="fa-solid fa-user "></i>
                        <input type="text" name="apellido" class="form__input-dos" value="{{ $usuario->apellido }}">
                        @if ($errors->has('apellido'))
                        <small class="alerta__color-rojo "><i class="fa-solid fa-circle-exclamation alerta-tamaño"></i>
                            Solo letras</small>
                    @endif
                    </div>

                    <div class="form__group-dos">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" name="telefono" class="form__input-dos" value="{{ $usuario->celular }}">
                        @if ($errors->has('telefono'))
                        <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation alerta-tamaño"></i>
                            Solo se acepta un telefono valido</small>
                    @endif
                    </div>

                    {{-- <div class="form__group-dos">
                        <i class="fa-solid fa-location-dot"></i>
                        <input type="text" name="direccion" placeholder="Direccion" class="form__input-dos">
                    </div> --}}

                    <div class="form__group-dos">
                        <button class="form__submit form__submit-editar"> Gurdar Cambios</button>
                    </div>
                </div>
            </form>

        </div>
    </aside>

    <!-- fin editar perfil -->

    <!--  codigo del modal -->
    <aside id="modal" class="modal__historial">
        <div class="modal-content">
            <span id="close__historial" class="close"><i class="fa-solid fa-xmark"></i></span>
            <h1 class="productos1"> Historial de compras</h1>
            <div class="card__container contenedor__card__historia">

                <article class="card__menu cards__modal__historial">
                    <a class="like-button" href="#"><i class="fa-regular fa-heart"></i><strong>145M</strong></a>
                    <div class="content__car__menu " id="image-container" data-modal-target="myModal">
                        <img src="/assets/img/img-carta-producto/hamburguesa.jpg" alt="producto">
                    </div>
                    <div class="content__parrafo__agregar">
                        <h2>Hamburguesa en salsa</h2>
                        <p class="parrafo__cart">Lorem, ipsum dolor sit amet
                            consectetur adipisicing elit. Maxime doloribus
                            excepturi reiciendis error distinctio! Maxime
                            distinctio quibusdam tempora repellat perferendis
                            ratione quae quo?</p>
                    </div>
                    <div class="pie__card"></div>
                </article>
            </div>
        </div>
    </aside>


    <section class="contenedor__info__superior">

        <h1 class="form__title">
            <i class="fa-solid fa-user"></i>
            Perfil
        </h1>

        <div class="form__button__acciones">
            <button id="youreditar" type="submit" class="form__submit">Editar
                Perfil</button>
            <button id="misComprasButton" class="form__submit">Mis Compras</button>
        </div>

    </section>

    <section class="form__control__perfil">
        <h1 class="form__subtitle">Datos de usuario</h1>
        <div class="form__container">

            <div class="form__group">
                <i class="fa-solid fa-user"></i>
                <input type="text" class="form__input" value="{{ $usuario->nombre }}" readonly>
            </div>
            <div class="form__group">
                <i class="fa-solid fa-user"></i>
                <input type="text" class="form__input" value="{{ $usuario->apellido }}" readonly>
            </div>

            <div class="form__group">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" class="form__input" value="{{ $usuario->email }}" readonly>
            </div>

            <div class="form__group">
                <i class="fa-solid fa-phone"></i>
                <input type="tel" class="form__input" value="{{ $usuario->celular }}" readonly>
            </div>

            <div class="form__group">
                <i class="fa-solid fa-location-dot"></i>
                <input type="text" class="form__input" value="pasarla desde la compra" readonly>
            </div>

        </div>
    </section>



    <script src="{{ asset('assets/js/modalPerfil.js') }}"></script>
    <script src="{{ asset('assets/js/modalPerfil-dos.js') }}"></script>
@endsection
