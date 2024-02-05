@extends('layouts.dashboard')

@section('contenido')
    <section class="tabular--wrapper">
        <h1 class="title header--title">Crear nuevo producto</h1>

        <div class="container">

            <form action="#" class="row g-3 control-form" method="POST" enctype="multipart/form-data">

                <div class="form__control-img  col-md-6 mb-4">
                    <img src="https://img.freepik.com/vector-gratis/ilustracion-nube-concepto-almacenamiento-nube_53876-8485.jpg?w=740&t=st=1706836474~exp=1706837074~hmac=003e490e6fc999fae93f04198110fcde48e4306da40637ac8047ef2c222df811"
                        alt="avatar" id="img" />
                    <input type="file" name="foto" id="foto" accept="image/*" />
                    <label for="foto">imagen producto</label>


                    
                
                    <div class="col-12">
                        <button class="btn__formulario-button">Enviar</button>
                    </div>
                </div>

                <div class="col g-5">
                    <div class="row">

                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Categoria</label>
                            <select id="inputState" class="form-select form__control__input">
                                <option disabled>Selecciona la categoría</option>
                                <option>...</option>
                                <option>...</option>
                                <option>...</option>
                                <option>...</option>
                                <option>...</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Subcategoria</label>
                            <select id="inputState" class="form-select form__control__input">
                                <option disabled>selecciona la subcategoría</option>
                                <option>...</option>
                                <option>...</option>
                                <option>...</option>
                                <option>...</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="nombre-input">Nombre</label>
                            <input type="text" class="form-control form__control__input" id="nombre-input">
                        </div>

                        <div class="col-md-6">
                            <label for="nombre-input">Precio</label>
                            <input type="text" class="form-control form__control__input" id="nombre-input">
                        </div>

                        <div class="col-md-6">
                            <label for="nombre-input">Tamaño</label>
                            <input type="text" class="form-control form__control__input" id="nombre-input"
                                placeholder="ejem: Grande,paqueño,mediano...">
                        </div>

                        <div class="col-md-6">
                            <label for="nombre-input">Descuento</label>
                            <input type="text" class="form-control form__control__input" id="nombre-input">
                        </div>

                        <div class="form-floating g-3">
                            <textarea class="form-control form__control__input" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Descripcion del producto</label>
                        </div>

                    </div>

                    

                </div>
            </form>

        </div>

    </section>

    <script src="{{ asset('assets/js/previsualizacion-imagen.js') }}"></script>
@endsection
