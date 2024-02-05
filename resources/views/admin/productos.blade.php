@extends('layouts.dashboard')

@section('contenido')
    <section class="tabular--wrapper">

        <div class="contendor__boton">
            <a class="btn__categoria" href="{{ route('crear-productos') }}" >editar producto</a>
        </div>
        <h1 class="title header--title">Producto actuales</h1>

        <div class="container row">

            <article class="card card__admin-producto  col-6">
                <img src="{{ asset('assets/img/img-carta-producto/hamburguesa.jpg') }}" class="card-img-top"
                    alt="ejemplo-img">
                <div class="card-body">
                    <h4 class="header--title">Card title</h4>
                    <p class="card-text header--title">Some quick example text to build on the card title and make up the
                        bulk of the
                        card's content.</p>
                </div>
                <ul class="list-group list-group-flus">
                    <li class="list-group-item color--text">Precio <span>$ 25.000</span></li>
                    <li class="list-group-item color--text">Disponible</li>
                    <li class="list-group-item color--text">hamburgesa</li>
                </ul>

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

            </article>

            <article class="card card__admin-producto col-6">
                <img src="{{ asset('assets/img/img-carta-producto/hamburguesa.jpg') }}" class="card-img-top"
                    alt="ejemplo-img">
                <div class="card-body">
                    <h4 class="header--title">Card title</h4>
                    <p class="card-text header--title">Some quick example text to build on the card title and make up the
                        bulk of the
                        card's content.</p>
                </div>
                <ul class="list-group list-group-flus">
                    <li class="list-group-item color--text">Precio <span>$ 25.000</span></li>
                    <li class="list-group-item color--text">Disponible</li>
                    <li class="list-group-item color--text">hamburgesa</li>
                </ul>

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

            </article>

            <article class="card card__admin-producto col-6">
                <img src="{{ asset('assets/img/img-carta-producto/hamburguesa.jpg') }}" class="card-img-top"
                    alt="ejemplo-img">
                <div class="card-body">
                    <h4 class="header--title">Card title</h4>
                    <p class="card-text header--title">Some quick example text to build on the card title and make up the
                        bulk of the
                        card's content.</p>
                </div>
                <ul class="list-group list-group-flus">
                    <li class="list-group-item color--text">Precio <span>$ 25.000</span></li>
                    <li class="list-group-item color--text">Disponible</li>
                    <li class="list-group-item color--text">hamburgesa</li>
                </ul>

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

            </article>

            <article class="card card__admin-producto col-6">
                <img src="{{ asset('assets/img/img-carta-producto/hamburguesa.jpg') }}" class="card-img-top"
                    alt="ejemplo-img">
                <div class="card-body">
                    <h4 class="header--title">Card title</h4>
                    <p class="card-text header--title">Some quick example text to build on the card title and make up the
                        bulk of the
                        card's content.</p>
                </div>
                <ul class="list-group list-group-flus">
                    <li class="list-group-item color--text">Precio <span>$ 25.000</span></li>
                    <li class="list-group-item color--text">Disponible</li>
                    <li class="list-group-item color--text">hamburgesa</li>
                </ul>

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

            </article>

            <article class="card card__admin-producto col-6">
                <img src="{{ asset('assets/img/img-carta-producto/hamburguesa.jpg') }}" class="card-img-top"
                    alt="ejemplo-img">
                <div class="card-body">
                    <h4 class="header--title">Card title</h4>
                    <p class="card-text header--title">Some quick example text to build on the card title and make up the
                        bulk of the
                        card's content.</p>
                </div>
                <ul class="list-group list-group-flus">
                    <li class="list-group-item color--text">Precio <span>$ 25.000</span></li>
                    <li class="list-group-item color--text">Disponible</li>
                    <li class="list-group-item color--text">hamburgesa</li>
                </ul>

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

            </article>



        </div>

    </section>

    <script src="{{ asset('assets/js/previsualizacion-imagen.js') }}"></script>
@endsection
