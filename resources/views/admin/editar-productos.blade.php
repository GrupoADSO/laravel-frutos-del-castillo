@extends('layouts.dashboard')

@section('contenido')
    <section class="tabular--wrapper">
        <h1 class="title header--title">Editar producto</h1>

        <div class="container">

            <form action="{{ route('update-producto', encrypt($productoId->id)) }}" class="row g-3 control-form" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form__control-img col-4">
                    <img src="{{ $productoId->imagen_1 }}" alt="{{ $productoId->nombre }}" id="img" />
                    <input type="file" name="foto__producto" id="foto" accept="image/*" />
                    <label for="foto">imagen producto</label>
                    @if ($errors->has('foto__producto'))
                        <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> la url es
                            invalidad</small>
                    @endif

                    <div class="col-12">
                        <button class="btn__formulario-button">Enviar</button>
                    </div>
                </div>

                <div class="col g-5">
                    <div class="row">

                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Categoria</label>
                            <select id="inputState" name='seleccion__categoria' class="form-select form__control__input">
                                <option selected value="{{ $productoId->categoria_id }}">{{ $productoId->nombre }}
                                </option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Estado del producto</label>
                            <select id="inputState" name='disponibilidad' class="form-select form__control__input">
                                <option value="1" {{ $productoId->disponibilidad == 1 ? 'selected' : '' }}>Disponible</option>
                                <option value="0" {{ $productoId->disponibilidad == 0 ? 'selected' : '' }}>No Disponible</option>
                            </select>
                            @if ($errors->has('disponibilidad'))
                                <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i>Argumento no valido</small>
                            @endif
                        </div>
                        
                        


                        <div class="col-md-6 py-2">
                            <label for="nombre-input">Nombre</label>
                            <input type="text" class="form-control form__control__input" name="nombre__producto"
                                id="nombre-input" value="{{ $productoId->nombre }}">
                            @if ($errors->has('nombre__producto'))
                                <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> el nombre
                                    es invalidad</small>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="nombre-input">Precio</label>
                            <input type="text" class="form-control form__control__input" name="precio__producto"
                                id="nombre-input" value="{{ $productoId->precio }}">
                            @if ($errors->has('precio__producto'))
                                <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> solo se
                                    aceptan numeros</small>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="nombre-input">Tamaño</label>
                            <input type="text" class="form-control form__control__input" name="tamanio__producto"
                                id="nombre-input" value="{{ $productoId->size }}" placeholder="ejem.grande,mediana..">
                            @if ($errors->has('tamanio__producto'))
                                <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i>Tamaño invalido</small>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="nombre-input">Descuento</label>
                            <input type="text" class="form-control form__control__input" name="descuento__producto"
                                id="nombre-input" value="{{ $productoId->descuento }}">
                            @if ($errors->has('descuento__producto'))
                                <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> solo se
                                    aceptan numeros</small>
                            @endif
                        </div>

                        <div class="form-floating g-3">
                            <textarea class="form-control form__control__input" id="floatingTextarea" name="descripcion__producto">{{ $productoId->descripcion }}</textarea>
                            <label for="floatingTextarea">Descripcion del producto</label>
                            @if ($errors->has('descripcion__producto'))
                                <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> la
                                    descripcion no acepta caracteres como: @-/* y
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
