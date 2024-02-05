<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('titulo')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('/assets/css/necolas.github.io_normalize.css_8.0.1_normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<body>

    <!-- inicio del header -->
    <header class="header-container">
        <div class="efecto-espejo"></div>
        <div class="logo">
            <img src="/assets/img/img-utileria/FrutosDelCastillo-logo.png" alt="Logo Frutos">
        </div>

        <nav id="nav__hamburguesa" class="navegacion__header">
            <button id="cerrarVentana" class="cerrar__menu"><i class="fa-solid fa-xmark"></i></button>

            <ul class="lista__paginas-header">
                <li><a href="{{ route('inicio') }}">Inicio</a></li>
                <li><a href="{{ route('producto') }}">Menu</a></li>
                <li><a href="/paginas/sobreNosotros.html">Sobre
                        Nosotros</a></li>

                <li class="lista__desplegable">
                    <span class="a-submenu">Domicilio-Reserva</span>
                    <ul class="submenu">
                        <li><a id="mostrarDomicilio" class="a-submenu" href="#">Domicilio</a></li>
                        <li><a id="mostrarReservas" class="a-submenu" href="#">Reserva</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <nav class="header__icon">
            <button class="boton-icon" id="logoAbrirModal"><i class="fa-solid fa-user"></i></button>
            <button class="boton-icon" id="cart-icon"><i class="fa-solid fa-cart-shopping"></i><span
                    id="contador-carrito">0</span></button>
            <!--organizar js para el carrito-->
        </nav>

        <button id="abrirVentana" class="desplegar__menu"><i class="fa-solid fa-bars"></i></button>

    </header>
    <!-- fin de header -->

    @if (session('logueado'))
        <div class="alerta__inicio__session">
            <h1 class="mensaje__alerta" id="mensajeAlertaInicioSession">{{ session('logueado') }}</h1>
        </div>
    @endif

    @if (session('usuarioCreado'))
        <div class="alerta__usuario__creado">
            <h1 class="mensaje__alerta" id="mensajeAlertaUsuarioCreado">{{ session('usuarioCreado') }} <i class="bi bi-check2-square"></i></h1>
        </div>
    @endif

    <div id="login-modal" class="modal-perfil"></div>

    <img src="/assets/img/img-utileria/fondo_interior.jpeg" class="fondo__mesa" alt="mesa">

    {{-- carrito --}}
    <aside class="carrito">
        <div class="arib">
            <h2 class="carrito-tittle">Canasta</h2>
            <!--  close modal -->
            <i class="fa-solid fa-x equis" id="close-cart"></i>
        </div>
        <div class="abaj">

            <i class="fa-solid fa-location-dot icon__ubicacion"></i>

            <h6 class="ri">Direccion los almendros</h6>
        </div>
        <div class="compras-content">

            <div class="cart-content">
                <!-- contenido -->
            </div>
        </div>

        <div class="parteabajo">
            <div class="botones_abajo">
                <a href="./factura.html">
                    <p class="pay-button">Ir a
                        Pagar</p>
                </a>
                <div class="subtotal">
                    $0
                </div>
            </div>
            <div class="clear-cart">
                <a href="#" class="clear-button">
                    <i class="fa-solid fa-trash-can clear-icon"></i>
                    Limpiar Canasta
                </a>
            </div>
        </div>
    </aside>

    <main>

        {{-- inclulle los modales --}}
        @include('modales.modal')


        {{-- contenido principal de cada pagina --}}
        @yield('contenido')

    </main>

    <!-- inicio del footer -->
    <footer class="footer">
        <nav class="footer__nav">
            <h3 class="titulo">informacion</h3>
            <a href="/paginas/informacion_legal.html" class="link">informacion
                legal</a>
            <a href="#" class="link">Politicad de privacidad</a>
            <a href="#" class="link">Tratamiento de datos</a>
        </nav>
        <nav class="footer__nav">
            <h3 class="titulo">Contactanos</h3>
            <a href="#" class="link">whasahtpp</a>
            <a href="#" class="link">00-00-00-00-00</a>
            <a href="#" class="link">correo@correo.com</a>
        </nav>
        <div class="redes__sociales">
            <a href="#" class="link__redes"><i class="fa-solid fa-location-dot"></i></a>
            <a href="#" class="link__redes"><i class="fab fa-facebook icono"></i></a>
            <a href="#" class="link__redes"><i class="fab fa-instagram icono"></i></a>
        </div>

        <div class="copy">
            <span>&copy; 2023 Todos los derechos reservados | Diseñado
                por:
                <span>Adso-2</span></span>
        </div>
    </footer>
    <!-- fin del footer -->

    <!-- js controles -->
    <script src="{{ asset('assets/js/modales_login.js') }}"></script>
    <script src="{{ asset('assets/js/carrito.js') }}"></script>
    <script src="{{ asset('assets/js/menuHamburguesa.js') }}"></script>
</body>

</html>
