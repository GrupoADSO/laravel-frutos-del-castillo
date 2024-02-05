<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('img/img-header/FrutosDelCastillo-logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <title>Dashboard</title>
</head>

<body class="body__dashboard">
    <header class="sidebar">
        <picture class="container__dashboard-logo">
            <img src="{{ asset('assets/img/img-utileria/FrutosDelCastillo-logo.png') }}" alt="">
        </picture>
        <nav>
            <ul class="menu">
                <li class="active">
                    <a href={{ route('inicio-admin') }}>
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class=" fas fa-user"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('categorias') }}">
                        <i class="fas fa-chart-bar"></i>
                        Categorias
                    </a>
                </li>
                <li>
                    <a href="{{ route('usuarios') }}">
                        <i class="fas fa-users"></i>
                        Usuarios
                    </a>
                </li>
                <li>
                    <a href="{{ route('crear-productos') }}">
                        <i class="fa-brands fa-product-hunt"></i>
                        Crear Productos
                    </a>
                </li>
                <li>
                    <a href="{{ route('productos') }}">
                        <i class="fa-brands fa-product-hunt"></i>
                        Productos
                    </a>
                </li>
                <li>
                    <a href="{{ route('slider') }}">
                        <i class="fa-solid fa-sliders"></i> Slider
                    </a>
                </li>
                <li class="logout">
                    <a href="/">
                        <i class="fas fa-sign-out-alt"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="main--content">

        <section class="header--wrapper">
            <div class="header--title">
                <h2>Dashboard</h2>
            </div>
            <section class="user--info">
                <article class="search--box">
                    <i class="fa-solid fa-search"></i>
                    <input type="text" placeholder="Search">
                </article>
                <picture>
                    <img src="https://as2.ftcdn.net/v2/jpg/03/48/47/85/1000_F_348478516_mXBDHijg9EcV7y9Bpxixwm193Ntx2Ntf.jpg"
                        alt="La mamba negra" title="La mamba negra">
                </picture>
            </section>
        </section>

        {{-- Contenido principal --}}
        @yield('contenido')

    </main>





</body>

</html>