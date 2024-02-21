@extends('layouts.dashboard')

@section('contenido')
    <section class="tabular--wrapper">
        <h1 class="title header--title">Crear Categoria y asignar subcategoria</h1>

        <div class="container">

            <form action="{{ route('nuevo-slider') }}" class="row g-3 control-form" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form__control-img col-4">
                    <img src="https://img.freepik.com/vector-gratis/ilustracion-nube-concepto-almacenamiento-nube_53876-8485.jpg?w=740&t=st=1706836474~exp=1706837074~hmac=003e490e6fc999fae93f04198110fcde48e4306da40637ac8047ef2c222df811"
                        alt="avatar" id="img" />
                    <input type="file" name="foto__slider" id="foto" accept="image/*" />
                    <label for="foto">imagen slider</label>
                    @if ($errors->has('nombre__slider'))
                        <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> La url de la imagen
                            es invalida</small>
                    @endif

                    <div class="col-12">
                        <button class="btn__formulario-button">Enviar</button>
                    </div>

                </div>

                <div class="col g-5">

                    <div class="col-md-6">
                        <label for="nombre-input">Nombre slider</label>
                        <input type="text" class="form-control form__control__input" name="nombre__slider"
                            id="nombre-input">
                        @if ($errors->has('nombre__slider'))
                            <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> El nombre es
                                invalida</small>
                        @endif
                    </div>

                </div>


            </form>

        </div>

    </section>

    <script src="{{ asset('assets/js/previsualizacion-imagen.js') }}"></script>

    {{-- anadir estilo de validacion --}}
@endsection
