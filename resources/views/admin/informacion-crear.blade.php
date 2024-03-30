@extends('layouts.dashboard')

@section('contenido')
    <section class="tabular--wrapper">
        <h1 class="title header--title">Informacion Corporativa</h1>
        <a class="btn__retorno" href="{{ route('informacion') }}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div class="container">

            <form action="{{ route('informacion-crear') }}" class="row g-3 control-form" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <div class="form__control-img col-4">
                    <img src="https://img.freepik.com/vector-gratis/ilustracion-nube-concepto-almacenamiento-nube_53876-8485.jpg?w=740&t=st=1706836474~exp=1706837074~hmac=003e490e6fc999fae93f04198110fcde48e4306da40637ac8047ef2c222df811"
                        alt="avatar" id="img" />
                    <input type="file" name="foto__slider" id="foto" accept="image/*" />
                    <label for="foto">imagen slider</label>
                    @if ($errors->has('foto__slider'))
                    <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> La url de la imagen es invalida</small>
                @endif

                    <div class="col-12">
                        <button class="btn__formulario-button">Enviar</button>
                    </div>

                </div> --}}

                <div class="row-6">

                    <div class="col-md-6">
                        <label for="nombre-input">Titulo</label>
                        <input type="text" class="form-control form__control__input" name="titulo" id="nombre-input">
                        @if ($errors->has('titulo'))
                        <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> El nombre es invalida</small>
                    @endif
                    </div>
                    
                    <div class="row g-1">
                        <label for="floatingTextarea">Informacion</label>
                        <div class="col-6">
                            <textarea class="form-control form__control__input" name="descripcion" id="floatingTextarea"></textarea>
                        </div>
                        @if ($errors->has('descripcion'))
                            <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> la descripcion
                                no acepta caracteres como: @-/* y
                                demas</small>
                        @endif
                    </div>

                    <div class="mt-5 col-6">
                            <button class="btn__formulario-button   ">Enviar</button>
                    </div>

            </form>

        </div>

    </section>

    {{-- <script src="{{ asset('assets/js/previsualizacion-imagen.js') }}"></script> --}}
@endsection
