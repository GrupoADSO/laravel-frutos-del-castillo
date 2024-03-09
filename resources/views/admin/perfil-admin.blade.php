@extends('layouts.dashboard')

@section('contenido')
    <section class="tabular--wrapper">
        <h1 class="title header--title">Actualiza Tus Datos (Administrador)</h1>

        <div class="container">

            <form action="{{ route('perfil-admin-actualizar', $datosAdmin->id) }}" class="row" id="miFormulario" method="POST">
                @csrf
                <div class="col-6">
                    <label for="nombre-input">Nombre</label>
                    <input type="text" class="form-control form__control__input" name="nombre_persona"
                        value="{{ $datosAdmin->nombre }}" id="nombre-input">
                </div>

                <div class="col-6">
                    <label for="apellido-input">Apellido</label>
                    <input type="text" class="form-control form__control__input" name="apellido_persona"
                        value="{{ $datosAdmin->apellido }}" id="apellido-input">
                </div>

                <div class="col-6">
                    <label for="telefono-input">Telefono</label>
                    <input type="text" class="form-control form__control__input" name="telefono_persona"
                        value="{{ $datosAdmin->celular }}" id="telefono-input">
                </div>

                <div class="col-6">
                    <label for="fecha-nacimiento-input">Fecha Nacimiento</label>
                    <input type="text" class="form-control form__control__input" name="nacimiento_persona"
                        value="{{ $datosAdmin->fecha_nacimiento }}" id="fecha-nacimiento-input">
                </div>

                <div class="col-12">
                    <label for="email-input">Correo</label>
                    <input type="email" class="form-control form__control__input" name="email_persona"
                        value="{{ $datosAdmin->email }}" id="email-input">
                </div>

                <div class="g-4">
                    <button class="btn__formulario-button" id="limpiar">Limpiar</button>
                    <button class="btn__formulario-button">Enviar</button>
                </div>
            </form>

        </div>


        </div>

    </section>

    <script>
        document.getElementById('limpiar').addEventListener('click', function(e) {
            e.preventDefault()
            document.getElementById('miFormulario').reset();
        });
    </script>
@endsection
