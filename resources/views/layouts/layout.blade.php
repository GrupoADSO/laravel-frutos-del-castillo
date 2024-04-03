<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('titulo')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
            <img src="/assets/img/img-utileria/la-romana-logo.png" alt="Logo Frutos">
        </div>

        <nav id="nav__hamburguesa" class="navegacion__header">
            <button id="cerrarVentana" class="cerrar__menu"><i class="fa-solid fa-xmark"></i></button>

            <ul class="lista__paginas-header">
                <li class="{{ Request::is('/') ? 'submenu' : '' }}"><a href="{{ route('inicio') }}">Inicio</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF'])=='productos' ) { echo 'class="submenu"' ; } ?>><a
                        href="{{ route('producto') }}">Menu</a></li>
                <li <?php if (basename($_SERVER['PHP_SELF'])=='sobre_mi' ) { echo 'class="submenu"' ; } ?>><a
                        href="{{ route('sobreMi') }}">Sobre
                        Nosotros</a></li>
            </ul>
        </nav>

        <nav class="header__icon">
            @auth
            <div class="contenedor__seccion">
                <input type="checkbox" id="toggle-menu" class="boton-icon-checkbox">
                <label for="toggle-menu" class="boton-icon boton-icon-label"><i class="fa-solid fa-user"></i></label>
                <div class="menu__usuario">
                    <ul>
                        <li><a href="{{ route('perfil')}}">Mi Perfil</a></li>
                        @role('super_admin|empleado')
                        <li><a href="{{ route('inicio-admin')}} ">Dashboard</a></li>
                        @endrole
                        <li><a href="{{ route('cerrarSesion') }}">Cerrar sesión</a></li>
                    </ul>
                </div>
            </div>
            @endauth
            @guest
            <button class="boton-icon" id="logoAbrirModal"><i class="fa-solid fa-user"></i></button>
            @endguest
            <a href="#" class="boton-icon" id="cart-icon"><i class="fa-solid fa-cart-shopping"></i><span
                    id="contador-carrito">0</span></a>
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
        <h1 class="mensaje__alerta" id="mensajeAlertaUsuarioCreado">{{ session('usuarioCreado') }} <i
                class="bi bi-check2-square"></i></h1>
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

            <h6 class="ri">{{ Session::get('ultima_direccion') }}</h6>
        </div>
        <div class="compras-content">

            <div class="cart-content" id="cart__content">
                <!-- contenido -->
            </div>

        </div>

        <div class="parteabajo">
            <div class="botones_abajo">
                <a href="{{ route('factura') }}">
                    <p class="pay-button">Ir a
                        Pagar</p>
                </a>
                <div id="total__value" class="subtotal">
                    $0
                </div>
            </div>
            {{-- <div class="clear-cart">
                <a href="#" class="clear-button">
                    <i class="fa-solid fa-trash-can clear-icon"></i>
                    Limpiar Canasta
                </a>
            </div> --}}
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
            <a href="{{ route('informacionLegal') }}" class="link">informacion
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
    <script src="{{ asset('assets/js/factura.js') }}"></script>
</body>

</html>