@extends('layouts.dashboard')

@section('contenido')
@if (session('alertaDeAccion'))
<div class="alerta__acciones">
    <h1 class="mensaje__alerta" id="mensajeAlertaUsuarioCreado">{{ session('alertaDeAccion') }} <i
            class="bi bi-check2-square"></i></h1>
</div>
@endif


    <section class="card--container">
        <h3 class="main--title">Datos del día</h3>
        <article class="card--wrapper">
            <article class="payment--card">
                <article class="card--header">
                    <article class="amount">
                        <p class="title">Usuarios Registrados</p>
                        <p class="amount--value">{{ $totalUsuarios }}</p>
                    </article>
                    <i class="fas fa-users icon "></i>
                </article>
                <p class="card-detail">**** **** **** ****</p>
            </article>

            <article class="payment--card">
                <article class="card--header">
                    <article class="amount">
                        <p class="title">productos Registrados</p>
                        <p class="amount--value">{{ $totalProductos }}</p>
                    </article>
                    <i class="fas fa-list icon "></i>
                </article>
                <p class="card-detail">**** **** **** ****</p>
            </article>

            <article class="payment--card">
                <article class="card--header">
                    <article class="amount">
                        <p class="title">Compras Realizados</p>
                        <p class="amount--value">{{ $totalCompras }}</p>
                    </article>
                    <i class="fas fa-dollar-sign icon "></i>
                </article>
                <p class="card-detail">**** **** **** ****</96</p>
            </article>
            
            <article class="payment--card">
                <article class="card--header">
                    <article class="amount">
                        <p class="title">Ganancias del mes</p>
                        <p class="amount--value">{{ $gananciasDelMes }}</p>
                    </article>
                    <i class="fas fa-check icon "></i>
                </article>
                <p class="card-detail">**** **** **** ****</p>
            </article>
        </article>  
    </section>

    <section class="tabular--wrapper">
        <form class="user--info user--info-rigth" method="GET" action="{{ route('inicio-admin') }}">
            <div class="search--box">
                <button class="busqueda"><i class="fa-solid fa-search"></i></button>
                <input type="search" name="buscar_usuario" value="{{ $texto }}" placeholder="Search">
            </div>
        </form>

        <h1 class="title header--title">Usuarios registrados</h1>
        <table>
            <thead>
                
                <tr>
                    <th scope="col">nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">opciones</th>
                </tr>
            </thead>
            <tbody>
                @if ($datosUsuarios->isEmpty())
                <tr>
                    <th colspan="6" class="header--title">{{ $mensaje }}</th>
                </tr>
                @endif
                @foreach ($datosUsuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->apellido }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->celular }}</td>
                        <td>
                            <form action="{{ route('usuarios-editar',encrypt($usuario->id)) }}" method="GET" style="margin: 0">
                                <button>
                                    <svg class="icon icon-tabler icon-tabler-pencil" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                        <path d="M13.5 6.5l4 4" />
                                    </svg>
                                </button>
                            </form>
                            <form action="{{ route('usuarios-eliminar',encrypt($usuario->id)) }}" method="POST" style="margin: 0">
                                @csrf
                                @method('delete')
                                <button>
                                    <svg class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path d="M10 11l0 6" />
                                        <path d="M14 11l0 6" />
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="paginacion">
            {{ $datosUsuarios->links() }}
        </div>
    </section>
    <script src="{{ asset('js/alertasLogin.js') }}"></script>
@endsection
