@extends('layouts.dashboard')

@section('contenido')
    <section class="tabular--wrapper">
        <h1 class="title header--title">Crear Categoria y asignar subcategoria</h1>
        <a class="btn__retorno" href="{{ route('categorias') }}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>

        <div class="container">

            <form action="{{ route('update-categoria', encrypt($Categoriaid->id)) }}" class="row g-3 control-form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form__control-img">
                    <img src="{{ asset($Categoriaid->imagen) }}"
                        alt="avatar" id="img" />
                    <input type="file" name="cambiar__foto__cate" id="foto" value="" accept="image/*" />
                    
                    <label for="foto">imagen categoría</label>
                    @if($errors->has('cambiar__foto__cate'))
                        <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> La url de la imagen no es valida</small>
                    @endif
                    <div class="col-12">
                        <button class="btn__formulario-button">Enviar</button>
                    </div>
                </div>

                <div class="col g-5">
                    <div class="col-md-6">
                        <label for="nombre-input">Nombre Categoria</label>
                        <input type="text" class="form-control form__control__input" id="nombre-input" name="cambiar__nombre__cate" value="{{ $Categoriaid->nombre }}">
                    </div>
                    @if($errors->has('cambiar__nombre__cate')) 
                        <small class="alerta__color-rojo"><i class="fa-solid fa-circle-exclamation"></i> El nombre no es valido</small>                      
                    @endif
                </div>

            </form>

        </div>

    </section>

    <script src="{{ asset('assets/js/previsualizacion-imagen.js') }}"></script>
@endsection
