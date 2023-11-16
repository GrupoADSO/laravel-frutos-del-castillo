@extends('layouts.layout')


@section('titulo', 'contactanos')

@section('contenido')

    <div class="contenedor_contacto">
        <h1>Gracias por contactarnos</h1>
        <h4>Horario de apertura</h4>
        <p class="texto_horario">
            Ofrecemos nuestro servicio todos los dias.
            Abrimos de 4:00 P.m a 11:00 P.m
        </p>

        <form class="contenedor_principal" action="" method="post">

            <div class="contenedor_descripcion_contacto">
                <p>
                    En Frutos del Castillo, valoramos tu opinión y estamos
                    aquí para escucharte. Por favor, toma un momento para
                    proporcionarnos los detalles de tu PQRS (Petición, Queja,
                    Reclamo o Sugerencia) a continuación. Nuestro compromiso
                    es atender tu solicitud de manera oportuna y efectiva. <br><br>


                    Estamos comprometidos con la mejora continua y tu retroalimentación
                    es fundamental para lograrlo. Por favor, proporciona
                    toda la información relevante y detallada para que
                    podamos entender tu situación y brindarte la mejor solución
                    posible. <br><br>


                    Una vez que envíes tu PQRS, nuestro equipo de atención
                    al cliente se pondrá en acción para resolverlo. Haremos
                    todo lo posible para proporcionarte una respuesta.
                </p>

            </div>

            <div class="contenedor_formulario_contacto">
                <h2>Contactanos</h2>
                <label for="">Nombre</label><br>
                <!-- <textarea name="" id="nombre-contacto" cols="35" rows="2"></textarea><br><br> -->
                <input name="" id="nombre-contacto"><br><br>
                <label for="">Email</label><br>
                <!-- <textarea name="" id="nombre-contacto" cols="35" rows="2"></textarea><br><br> -->
                <input name="" id="nombre-contacto"><br><br>
                <label for="">Mensaje</label><br>
                <textarea name="" id="nombre-contacto" cols="35" rows="10"></textarea><br><br>
                <input class="checkbox_contacto" type="checkbox" name=""><label id="label_privacidad"> He leido y
                    acepto las politica de privacidad</label><br>
                <button id="enviar">Enviar</button>
            </div>
        </form>
    </div>

@endsection
