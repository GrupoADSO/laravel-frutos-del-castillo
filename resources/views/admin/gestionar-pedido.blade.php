@extends('layouts.dashboard')

@section('contenido')

<section class="tabular--wrapper">

    <div class="col g-5">
        <div class="row">

            <div class="col-md-6">
                <label for="nombre-input">Nombre del cliente</label>
                <input type="text" class="form-control form__control__input" value="{{$compra->usuario->nombre }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="nombre-input">Apellido del cliente</label>
                <input type="text" class="form-control form__control__input" value="{{$compra->usuario->apellido }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="nombre-input">Correo electronico</label>
                <input type="text" class="form-control form__control__input" value="{{$compra->usuario->email }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="nombre-input">Telefono</label>
                <input type="text" class="form-control form__control__input" value="{{$compra->usuario->celular }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="nombre-input">Fecha de la compra</label>
                <input type="text" class="form-control form__control__input" value="{{$compra->fecha_hora }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="nombre-input">Costo total</label>
                <input type="text" class="form-control form__control__input" value="{{$compra->costo_total }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="nombre-input">Detalles del pedido</label>
                <input type="text" class="form-control form__control__input" value="{{ $compra->comentario }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="nombre-input">Dirección del cliente</label>
                <input type="text" class="form-control form__control__input" value="{{$compra->direccion }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="nombre-input">Cantidad de productos comprados</label>
                <input type="text" class="form-control form__control__input" value="{{ $factura->cantidad_producto }}" disabled>
            </div>

            <div class="col-md-6">
                <label for="nombre-input">Precio por producto</label>
                <input type="text" class="form-control form__control__input" value="{{ $factura->precio }}" disabled>
            </div>

        </div>
    </div>

</section>

@endsection