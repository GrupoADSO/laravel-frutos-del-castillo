@extends('layouts.dashboard')

@section('contenido')

<section class="tabular--wrapper">
    <a class="btn__retorno" href="{{ route('mostrar-pedidos') }}">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
    <div class="col g-5">
        <div class="row">

            <h1 class="title header--title">Datos del usuario</h1>

            <div class="col-md-6">
                <label for="nombre-input">Nombre del cliente</label>
                <input type="text" class="form-control form__control__input" value="{{$compra->usuario->nombre }}"
                    disabled>
            </div>

            <div class="col-md-6">
                <label for="nombre-input">Apellido del cliente</label>
                <input type="text" class="form-control form__control__input" value="{{$compra->usuario->apellido }}"
                    disabled>
            </div>

            <div class="col-md-6">
                <label for="nombre-input">Correo electronico</label>
                <input type="text" class="form-control form__control__input" value="{{$compra->usuario->email }}"
                    disabled>
            </div>

            <div class="col-md-6 mb-4">
                <label for="nombre-input">Telefono</label>
                <input type="text" class="form-control form__control__input" value="{{$compra->usuario->celular }}"
                    disabled>
            </div>

            <h1 class="title header--title">Datos de la compra</h1>


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

            <div class="col-md-6 mb-4">
                <label for="nombre-input">Dirección del cliente</label>
                <input type="text" class="form-control form__control__input" value="{{ $compra->direccion }}" disabled>
            </div>

        </div>
    </div>

    <h1 class="title header--title">Productos comprados</h1>

    <table>
        <thead>
            <tr>
                <th scope="col">nombre</th>
                <th scope="col">precio</th>
                <th scope="col">descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($factura as $item)
                <tr>
                    <td>{{ $item->producto->nombre }}</td>
                    <td>{{ $item->producto->precio }}</td>
                    <td>{{ $item->producto->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table><br>

    <div class="row">
        <form action="{{ route('pedido-gestionado', $cambiarEstado) }}" class="col-2" method="POST">
            @csrf
            <button class="btn__formulario-button">Confirmar pedido</button>
        </form>

        <form action="{{ route('pedido-cancelado', $cambiarEstado) }}" class="col-2" method="POST">
            @csrf
            <button class="btn__formulario-button">Cancelar pedido</button>
        </form>

    </div>

</section>
@endsection