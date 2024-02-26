@extends('layouts.dashboard')

@section('contenido')
    <section class="tabular--wrapper">
        <h1 class="title header--title">Crear nuevo producto</h1>

        <div class="container">

            <form action="{{ route('nuevo-producto') }}" class="row g-3 control-form" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form__control-img  col-md-6 mb-4">
                    <img src="https://img.freepik.com/vector-gratis/ilustracion-nube-concepto-almacenamiento-nube_53876-8485.jpg?w=740&t=st=1706836474~exp=1706837074~hmac=003e490e6fc999fae93f04198110fcde48e4306da40637ac8047ef2c222df811"
                        alt="avatar" id="img" />
                    <input type="file" name="foto__producto" id="foto"
                        accept="" />
                    <label for="foto">imagen producto</label>
                    @if ($errors->has('foto__producto'))
                        <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> la url de la imagen es invalida</small>
                    @endif
                    <div class="col-12">
                        <button class="btn__formulario-button">Enviar</button>
                    </div>
                </div>

                <div class="col g-5">
                    <div class="row">


                        <div class="col-md-6">

                            <label for="inputState" class="form-label">Categoria</label>
                            <select id="inputState" name="seleccion__categoria" class="form-select form__control__input">
                                <option selected disabled>Selecciona la categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="nombre-input">Nombre</label>
                            <input type="text" name="nombre__producto" class="form-control form__control__input"
                                id="nombre-input" value="{{ old('nombre__producto') }}">
                            @if ($errors->has('nombre__producto'))
                                <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> el nombre es invalidad</small>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="nombre-input">Precio</label>
                            <input type="text" name="precio__producto" class="form-control form__control__input"
                                id="nombre-input" value="{{ old('precio__producto') }}">
                            @if ($errors->has('precio__producto'))
                                <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> solo acepta numero</small>
                            @endif

                        </div>

                        <div class="col-md-6">
                            <label for="nombre-input">Descuento</label>
                            <input type="text" name="descuento__producto" class="form-control form__control__input"
                                id="nombre-input" value="{{ old('descuento__producto') }}" >
                            @if ($errors->has('descuento__producto'))
                                <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> el descuento solo acepta numeros</small>
                            @endif
                        </div>

                        <div class="form-floating g-3">
                            <textarea class="form-control form__control__input" name="descripcion__producto" id="floatingTextarea">{{ old('descripcion__producto') }} </textarea>
                            <label for="floatingTextarea">Descripcion del producto</label>
                            @if ($errors->has('descripcion__producto'))
                                <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> la descripcion no acepta caracteres como: @-/* y
                                    demas</small>
                            @endif
                        </div>

                    </div>

                </div>
            </form>

        </div>

    </section>

    <script src="{{ asset('assets/js/previsualizacion-imagen.js') }}"></script>
@endsection
