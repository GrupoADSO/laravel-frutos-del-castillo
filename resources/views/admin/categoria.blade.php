@extends('layouts.dashboard')


@section('titulo', 'Inicio')

@section('contenido')
    @if (session('alertaDeAccion'))
        <div class="alerta__acciones">
            <h1 class="mensaje__alerta" id="mensajeAlertaUsuarioCreado">{{ session('alertaDeAccion') }} <i
                    class="bi bi-check2-square"></i></h1>
        </div>
        @endif
        <section class="tabular--wrapper">
        <h1 class="title header--title">Categorias activas</h1>

        @role('super_admin')
        <aside class="contenedor__btns">
            <div class="contendor__boton">
                <a class="btn__categoria" href="{{ route('crear-categoria') }}">Crear Categoria</a>
            </div>
        </aside>
        @endrole

        <table>
            <thead>
                <tr>
                    <th scope="col">Nombre Categoria</th>
                    @role('super_admin')
                    <th scope="col">Acciones</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nombre }}</td>
                        @role('super_admin')
                        <td>
                            <form action="{{ route('editar-categoria', encrypt($categoria->id)) }}" method="GET" style="margin: 0">
                                @csrf
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
                            {{-- Eliminar --}}
                            <form action="{{ route('eliminar-categoria', encrypt($categoria->id)) }}" method="POST"
                                style="margin: 0">
                                @csrf
                                @method('DELETE')
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
                        @endrole
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>


@endsection
