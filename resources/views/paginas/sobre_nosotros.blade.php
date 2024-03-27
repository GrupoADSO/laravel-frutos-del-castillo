@extends('layouts.layout')


@section('titulo', 'sobre-mi')

@section('contenido')

    <section class="contenedor__sobre__mi">
        <h1 class="title">Detrás de Nuestro Arte</h1>

        <div class="section-cart-sobre-mi">

            @foreach ($informacionEmpresarialMision as $mision)
                <div class="card-container">
                    <div class="card__fotos">
                        <img src="/assets/img/img-utileria/trabajadores.jpg" alt="Imagen-1" />
                    </div>

                    <div class="card__texto__bordes card-parrafo">
                        <h2>{{ $mision->nombre }}</h2>
                        {{-- <h2>Misión</h2> --}}
                        <div class="contenedor__parrafo">
                            <p class="parrafo">
                                {{ $mision->descripcion }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="section-cart-sobre-mi">


            @foreach ($informacionEmpresarialVision as $vision)
                <div class="card-container">
                    <div class="card__fotos">
                        <img src="https://thumbs.dreamstime.com/z/trabajador-de-mujer-que-vende-la-pizza-en-restaurante-los-alimentos-preparaci%C3%B3n-r%C3%A1pida-visi%C3%B3n-trasera-comida-italiana-sabrosa-139117130.jpg"
                            alt="Imagen-1" />
                    </div>

                    <div class="card__texto__bordes card-parrafo">
                        <h2>{{ $vision->nombre }}</h2>
                        {{-- <h2>Misión</h2> --}}
                        <div class="contenedor__parrafo">
                            <p class="parrafo">
                                {{ $vision->descripcion }}
                            </p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- <div class="section-cart-sobre-mi">

            <div class="card-container">
                <div class="card__fotos">
                    <img src="/assets/img/img-utileria/trabajadores.jpg" alt="Imagen-1" />
                </div>

                <div class="card__texto__bordes card-parrafo">
                    <h2>Misión</h2>
                    <div class="contenedor__parrafo">

                        <p class="parrafo">
                            La misión de Frutos del Castillo es proporcionar a nuestros
                            clientes una selección excepcional de comida rápida,
                            preparada con los ingredientes más frescos y de la más alta
                            calidad, servida de manera rápida y amigable. Nos
                            comprometemos a superar las expectativas de nuestros clientes en
                            cada visita, brindando un ambiente acogedor y
                            una atención personalizada. Nos esforzamos por mantener los más
                            altos estándares de higiene y seguridad alimentaria
                        </p>
                    </div>
                </div>
            </div>

        </div> --}}


    </section>

@endsection
