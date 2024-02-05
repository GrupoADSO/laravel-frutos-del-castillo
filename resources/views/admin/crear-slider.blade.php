@extends('layouts.dashboard')

@section('contenido')


    <section class="tabular--wrapper">
        <h1 class="title header--title">Crear Categoria y asignar subcategoria</h1>
        
        <div class="container">

            <form action="#" class="row g-3 control-form" method="POST" enctype="multipart/form-data">

                <div class="form__control-img col-4">
                    <img src="https://img.freepik.com/vector-gratis/ilustracion-nube-concepto-almacenamiento-nube_53876-8485.jpg?w=740&t=st=1706836474~exp=1706837074~hmac=003e490e6fc999fae93f04198110fcde48e4306da40637ac8047ef2c222df811"
                        alt="avatar" id="img" />
                    <input type="file" name="foto" id="foto" accept="image/*" />
                    <label for="foto">imagen categoría</label>

                    <div class="col-12">
                        <button class="btn__formulario-button">Enviar</button>
                    </div>
                    
                </div>

                <div class="col g-5">

                    <div class="col-md-6">
                        <label for="nombre-input">Nombre slider</label>
                        <input type="text" class="form-control form__control__input" id="nombre-input">
                    </div>

                </div>
                
            
            </form>

        </div>

    </section>

    <script src="{{ asset('assets/js/previsualizacion-imagen.js') }}"></script>
@endsection
