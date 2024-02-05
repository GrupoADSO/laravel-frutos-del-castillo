@extends('layouts.dashboard')

@section('contenido')

    <section class="tabular--wrapper">

        <div class="contendor__boton">
            <a class="btn__categoria" href="{{ route('crear-slider') }}" >Crear slider</a>
        </div>

        <h1 class="title header--title">Slider activos</h1>

        <div class="container row">

            <article class="card" style="width: 18rem;">
                <img src="{{ asset('assets/img/img-carta-producto/hamburguesa.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title header--title">slider del mes de algo jeje</h5>
                </div>
                <div class="card-footer">
                    <div class="card-body form__productos ">
                        <form action="#" method="GET" style="margin: 0">
                            <button class="form__productos-button">
                                <svg class="icon icon-tabler icon-tabler-pencil" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                    <path d="M13.5 6.5l4 4" />
                                </svg>
                            </button>
                        </form>
                        <form action="#" method="POST" style="margin: 0">
                            <button class="form__productos-button">
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
                    </div>
                </div>
            </article>

        </div>

    </section>

    <script src="{{ asset('assets/js/previsualizacion-imagen.js') }}"></script>
@endsection
