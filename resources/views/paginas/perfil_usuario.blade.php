@extends('layouts.layout')



@section('titulo', 'perfil')

@section('contenido')

    <section class="contenedor__info">

        <section class="contenedor__info__superior">
            <i class="bi bi-person-fill"></i>
            <h2 class="form__title">Perfil</h2>
        </section>

        <section class="contenedor__info__superior">
            <!-- botones -->

            <div class="form__button__acciones">
                <button id="youreditar" type="submit" class="form__submit">Editar
                    Perfil</button>
                <button id="misComprasButton" type="submit" class="form__submit">Mis Compras</button>
                </div>
        </section>
    </section>

    <form action="#" class="form__control__perfil">
        <div class="form__container">

            <div class="form__group">
                <i class="bi bi-person-fill" id="log"></i>
                <input type="text" id="name" class="form__input" placeholder="Nombre">
            </div>

            <div class="form__group">
                <i class="bi bi-envelope-fill" id="log"></i>
                <input type="text" id="email" class="form__input" placeholder="Email">
            </div>

            <div class="form__group">
                <i class="bi bi-telephone-fill" id="log"></i>
                <input type="tel" name="tel" id="tel" placeholder="Telefono" class="form__input">
            </div>

            <div class="form__group">
                <i class="bi bi-geo-alt" id="log"></i>
                <input type="text" name="dir" id="dir" placeholder="Direccion" class="form__input">
            </div>

            <div class="form__group">
                <i class="bi bi-tags-fill" id="log"></i>
                <input type="text" name="cup" id="cup" placeholder="Cupones" disabled class="form__input">
            </div>
        </div>
    </form>
    </div>

    <!-- inicio editar perfil -->

    <div id="modal-dos" class="custom-modal">
        <div class="custom-modal-content">
            <span class="custom-close">&times;</span>

            <form action="#" class="form__control__perfil-dos">
                <div class="form__container-dos">
                    <i class="bi bi-person-fill form__title-dos"></i>
                    <div class="form__group-dos">
                        <i class="bi bi-person-fill form__title-dos"></i>
                        <input type="text" id="name" class="form__input-dos" placeholder="Nombre">
                    </div>

                    <div class="form__group-dos">
                        <i class="bi bi-telephone-fill" id="log-dos"></i>
                        <input type="tel" name="tel" id="tel" placeholder="Telefono" class="form__input-dos">
                    </div>

                    <div class="form__group-dos">
                        <i class="bi bi-geo-alt" id="log-dos"></i>
                        <input type="text" name="dir" id="dir" placeholder="Direccion" class="form__input-dos">
                    </div>

                    <div class="form__group-dos">
                        <input type="submit" name="cup" id="guardar" value="Guardar Cambios">
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- fin editar perfil -->

    <!--  codigo del modal -->
    <div id="modal" class="modal__historial">
        <div class="modal-content">
            <span id="close__historial" class="close">&times;</span>
            <h1 class="productos1"> Historial de Productos Comprados</h1>
            <div class="cards__modal__historial">
                <!-- Aquí puedes copiar las tarjetas -->
                <div class="card">
                    <div class="content__modal">
                        <div class="button-container">
                            <!-- ... (botones y íconos) ... -->
                            <!-- <a class="add-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg></a> -->
                            <a class="like-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"
                                        fill="white" />
                                </svg></a>
                        </div>
                        <img src="../img/img-header/hamburguesa.jpg">
                        <p>Esto es un texto de prueba para descripción de este producto</p>

                    </div>
                </div>
                <!-- ... (otras tarjetas) ... -->
                <div class="card">
                    <div class="content__modal">
                        <div class="button-container">
                            <!-- ... (botones y íconos) ... -->
                            <!-- <a class="add-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg></a> -->
                            <a class="like-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"
                                        fill="white" />
                                </svg></a>
                        </div>
                        <img src="../img/img-header/hamburguesa.jpg">
                        <p>Esto es un texto de prueba para descripción de este producto</p>

                    </div>
                </div>

                <div class="card">
                    <div class="content__modal">
                        <div class="button-container">
                            <!-- ... (botones y íconos) ... -->
                            <!-- <a class="add-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg></a> -->
                            <a class="like-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"
                                        fill="white" />
                                </svg></a>
                        </div>
                        <img src="../img/img-header/hamburguesa.jpg">
                        <p>Esto es un texto de prueba para descripción de este producto</p>

                    </div>
                </div>

                <div class="card">
                    <div class="content__modal">
                        <div class="button-container">
                            <!-- ... (botones y íconos) ... -->
                            <!-- <a class="add-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg></a> -->
                            <a class="like-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"
                                        fill="white" />
                                </svg></a>
                        </div>
                        <img src="../img/img-header/hamburguesa.jpg">
                        <p>Esto es un texto de prueba para descripción de este producto</p>

                    </div>
                </div>

                <div class="card">
                    <div class="content__modal">
                        <div class="button-container">
                            <!-- ... (botones y íconos) ... -->
                            <!-- <a class="add-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg></a> -->
                            <a class="like-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"
                                        fill="white" />
                                </svg></a>
                        </div>
                        <img src="../img/img-header/hamburguesa.jpg">
                        <p>Esto es un texto de prueba para descripción de este producto</p>

                    </div>
                </div>

                <div class="card">
                    <div class="content__modal">
                        <div class="button-container">
                            <!-- ... (botones y íconos) ... -->
                            <!-- <a class="add-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="50px" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg></a> -->
                            <a class="like-button" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="40px"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"
                                        fill="white" />
                                </svg></a>
                        </div>
                        <img src="../img/img-header/hamburguesa.jpg">
                        <p>Esto es un texto de prueba para descripción de este producto</p>

                    </div>
                </div>

            </div>
        </div>
    @endsection
