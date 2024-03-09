@extends('layouts.layout')

@section('titulo', 'factura')

@section('contenido')

    <div class="container mb-5">
        <h1 class="titulo__header titulo__header-button">Detalles de tu compra</h1>
        <main class="main-content">
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="color-text-factura" >Productos comprados</span>
                    </h4>
                    <ul class="list-group mb-3">

                    </ul>
                    <a href="{{ url('detalle_factura/pdf') }}" class="btn btn-primary bgr-color-boton col-12 ">Descargar PDF</a>

                </div>

                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Direccion de envio</h4>
                    <form class="needs-validation control__form" action="{{route('paypal')}}"  method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label form-label-color">Nombre</label>
                                <input type="text" class="form-control" id="firstName"  value="{{$datosUsuario->nombre}}" required disabled/>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label form-label-color">Apellido</label>
                                <input type="text" class="form-control" id="lastName"  value="{{$datosUsuario->apellido}}" required disabled/>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label form-label-color">email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bgr-color-span">@</span>
                                    <input type="email" class="form-control" id="email"  value="{{$datosUsuario->email}}" required disabled />
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label form-label-color">Address</label>
                                <input type="text" class="form-control" name="direccion" id="address" value="{{$compra->direccion}}" disabled
                                    required />
                            </div>

                            <div class="col-12">
                                <label for="address2" class="form-label form-label-color">Indicaciones <span
                                        class="text-muted-color text-muted ">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2" name="indicaciones" value="{{$compra->comentario}}" disabled
                                    placeholder="apartam ento o casa" />
                            </div>
                        </div>
                    </form>
                </div>
        </main>
    </div>

@endsection
