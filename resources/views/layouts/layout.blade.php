<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('titulo')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <!-- inicio del header -->
    <header class="header-container">
        <div class="efecto-espejo"></div>
        <div class="logo">
            <img src="../img/img-header/FrutosDelCastillo-logo.png" alt="Logo Frutos">
        </div>

        <nav id="nav__hamburguesa" class="navegacion__header">
            <button id="cerrarVentana" class="cerrar__menu"><i class="fa-solid fa-xmark"></i></button>

            <ul>
                <li>
                    <a class="hover-btn" href="../index.html">Inicio</a>
                    <a class="hover-btn" href="./menu.html">Menu</a>
                    <a class="hover-btn" href="./sobreNosotros.html">Sobre
                        Nosotros</a>
                </li>
                <li class="lista__desplegable">
                    <a class="a-submenu" href="#">Domicilio-Reserva</a>
                    <ul class="submenu">
                        <li><a id="mostrarDomicilio" class="a-submenu" href="#">Domicilio</a></li>
                        <li><a id="mostrarReservas" class="a-submenu" href="#">Reserva</a></li>
                </li>
            </ul>
        </nav>

        <nav class="header__icon">
            <li class="lista__iconos">
                <a class="icon" id="logoAbrirModal"><svg xmlns="http://www.w3.org/2000/svg" width="50"
                        height="60" fill="white" class="bi bi-person" viewBox="0 0 16 19">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                    </svg></a>
                <a class="icon" href="#" id="cart-icon"><svg xmlns="http://www.w3.org/2000/svg" width="60"
                        height="57" fill="white" class="bi bi-cart" viewBox="0 0 16 19">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg><span id="contador-carrito">0</span></a>
            </li>
            </ul>
        </nav>

        <button id="abrirVentana" class="desplegar__menu"><i class="fa-solid fa-bars"></i></button>

        <div class="carrito">
            <div class="arib">
                <h2 class="carrito-tittle">Canasta</h2>
                <!--  close modal -->
                <ion-icon name="close-circle-outline" class="equis" id="close-cart"></ion-icon>
            </div>
            <div class="abaj">
                <ion-icon name="location-outline" class="icon__ubicacion"></ion-icon>
                <h6 class="ri">Direccion los almendros</h6>
            </div>
            <div class="compras-content">
                <!-- contenido -->
                <div class="cart-content">

                </div>
            </div>

            <div class="parteabajo">
                <div class="botones_abajo">
                    <a href="./factura.html"><button class="pay-button">Ir a
                            Pagar</button> </a>
                    <div class="subtotal">
                        $0
                    </div>
                </div>
                <div class="clear-cart">
                    <a href="#" class="clear-button">
                        <ion-icon name="trash-outline" class="clear-icon"></ion-icon>
                        Limpiar Canasta
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="fondo__mesa">
        <div class="fondo__contenedor_logo ">

            <!-- fin de header -->
            {{-- inclulle los modales --}}
            @include('modales.modal')


            {{-- contenido principal de cada pagina --}}
            @yield('contenido')


        </div>
    </div>
    <!-- inicio del footer -->
    <footer>
        <div class="footer-container">

            <div class="footer-section">
                <h3>Ayuda</h3>
                <ul class="section__info">
                    <li><a href="#">Legales</a></li>
                    <li><a href="./paginas/informacion_legal.html">Politicas de
                            privacidad</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contactanos</h3>
                <ul class="section__info">
                    <li class="section__info_p">
                        <p><a href="./paginas/contacto.html"> PQRS</a></p>
                    </li>
                    <li><a href="https://web.whatsapp.com/3156589852"> WhatsApp </a></li>
                    <li class="section__info_p">
                        <p>Tell: +123456789</p>
                    </li>
                    <!-- <li class="section__info_p">
              <p>Frutosdelcastillo@Hotmail.Com</p>
            </li> -->
                </ul>
            </div>

            <div class="footer-section">

                <ul class="social-links">
                    <a href="https://www.google.com/maps/@3.6009227,-76.5025659,13z?entry=ttu/tu_pagina_de_instagram"
                        target="_blank"><img class="ubi" src="./img/location.jpg" alt="ubicacion"></a>

                    <a href="https://www.facebook.com/tu_pagina_de_facebook" target="_blank"><img
                            src="./icon/facebook.svg" alt="facebook" class="circle-image"></a>

                    <a href="https://www.instagram.com/tu_pagina_de_instagram" target="_blank"><img
                            src="./icon/instagram.svg" alt="instagram" class="circle-image"></a>

                </ul>
            </div>

        </div>

        <div class="derechos_autor">
            <ul class="section__info">
                <li><a href="#">Derechos de autor © 2023 FrutosDelCastillo | Todos
                        los Derechos Reservados</a></li>
            </ul>

        </div>
    </footer>
    <!-- fin del footer -->

    <!-- js controles -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/funcionalidad.js') }}"></script>
    <script src="{{ asset('js/reserva.js') }}"></script>
    <script src="{{ asset('js/modalDomicilio.js') }}"></script>
    <script src="{{ asset('js/modales_login.js') }}"></script>
    <script src="{{ asset('js/carrito.js') }}"></script>
    <script src="{{ asset('js/modalPerfil.js') }}"></script>
    <script src="{{ asset('js/modalPerfil-dos') }}"></script>
    <script src="{{ asset('js/modalDomicilio.js') }}"></script>
    {{-- icon scrip --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

</body>

</html>
