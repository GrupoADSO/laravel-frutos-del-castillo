@extends('layouts.layout')



@section('titulo', 'perfil')

@section('contenido')

    <section class="contenedor__info__superior">

        <h1 class="form__title">
            <i class="bi bi-person-fill"></i>
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
                <i class="bi bi-person-fill"></i>
                <input type="text" id="name" class="form__input" value="Juan Camilo">
            </div>

            <div class="form__group">
                <i class="bi bi-envelope-fill"></i>
                <input type="text" id="email" class="form__input" value="Correo@correo.com" readonly>
            </div>

            <div class="form__group">
                <i class="bi bi-telephone-fill"></i>
                <input type="tel" name="tel" id="tel" class="form__input" value="3186479655" readonly>
            </div>

            <div class="form__group">
                <i class="bi bi-geo-alt"></i>
                <input type="text" name="dir" id="dir" class="form__input" value="Mi casa" readonly>
            </div>

            <div class="form__group">
                <i class="bi bi-tags-fill"></i>
                <input type="text" name="cup" id="cup" class="form__input" value="No tiene Cupones Disponibles"
                    readonly>
            </div>

        </div>
    </section>

    <!-- inicio editar perfil -->

    <aside id="modal-dos" class="custom-modal">
        <div class="custom-modal-content">
            <span class="custom-close">&times;</span>

            <form action="#" class="form__control__perfil-dos">

                <div class="form__container-dos">
                    <i class="bi bi-person-fill form__title-dos"></i>

                    <div class="form__group-dos">
                        <i class="bi bi-person-fill"></i>
                        <input type="text" name="nombre" class="form__input-dos" placeholder="Nombre">
                    </div>

                    <div class="form__group-dos">
                        <i class="bi bi-telephone-fill"></i>
                        <input type="tel" name="telefono" placeholder="Telefono" class="form__input-dos">
                    </div>

                    <div class="form__group-dos">
                        <i class="bi bi-geo-alt"></i>
                        <input type="text" name="direccion" placeholder="Direccion" class="form__input-dos">
                    </div>

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
            <span id="close__historial" class="close">&times;</span>
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

    <script src="{{ asset('assets/js/modalPerfil.js') }}"></script>
@endsection
