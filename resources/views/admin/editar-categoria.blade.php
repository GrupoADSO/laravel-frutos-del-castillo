@extends('layouts.dashboard')

@section('contenido')
    <section class="tabular--wrapper">
        <h1 class="title header--title">Crear Categoria y asignar subcategoria</h1>

        <div class="container">

            <form action="{{ route('update-categoria', $Categoriaid->id) }}" class="row g-3 control-form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form__control-img">
                    <img src="{{ $Categoriaid->imagen }}"
                        alt="avatar" id="img" />
                    <input type="file" name="cambiar__foto__cate" id="foto" accept="image/*" />
                    
                    <label for="foto">imagen categoría</label>
                    @if($errors->has('foto__categoria'))
                        <small for="">La url de la imagen es valido</small>
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
                    @if($errors->has('nombre__categoria')) 
                        <small for="">El nombre no es valido</small>                      
                    @endif
                </div>

            </form>

        </div>

    </section>

    <script src="{{ asset('assets/js/previsualizacion-imagen.js') }}"></script>
@endsection
