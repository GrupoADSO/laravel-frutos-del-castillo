@extends('layouts.layout')


@section('titulo', 'factura')

@section('contenido')

    <div class="container">
        <h1 class="titulo__header titulo__header-button">Factura</h1>
        <main class="main-content">
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="color-text-factura">Tu Carrito</span>
                    </h4>
                    <ul class="list-group mb-3">
                    </ul>
                    
                </div>

                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Direccion de envio</h4>
                    <form class="needs-validation control__form" action="{{ route('paypal') }}"  id="form-compra" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label form-label-color">Nombre</label>
                                <input type="text" class="form-control" id="firstName"  value="{{$datos->nombre}}" disabled
                                    required />
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="lastName" class="form-label form-label-color">Apellido</label>
                                <input type="text" class="form-control" id="lastName"  value="{{$datos->apellido}}" disabled
                                    required />
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="username" class="form-label form-label-color">email</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text bgr-color-span">@</span>
                                    <input type="email" class="form-control" id="email"  value="{{$datos->email}}" disabled
                                        required />
                                    <div class="invalid-feedback">
                                        Please enter a valid email address for shipping updates.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label form-label-color">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="direccion" value="{{ $direccionUser }}"
                                    required />
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address2" class="form-label form-label-color">Indicaciones <span
                                        class="text-muted-color text-muted ">(Optional)</span></label>
                                <input type="text" class="form-control" id="address2" name="indicaciones"
                                    placeholder="apartam ento o casa" />
                            </div>

                        </div>

                        <hr class="my-4" />

                        <h4 class="mb-3">Metodo de Pago</h4>

                        <div class="my-3">
                            <div class="metodo__pago ">
                                <div class="tarjeta">
                                    <label class="form-check-label" for="credit">Efectivo</label>
                                    <i class="fa fa-usd center"></i>
                                </div>

                                <div class="metodo__pago">
                                    <div class="tarjeta metodo__pago-efecto">
                                        <input type="hidden" name="price" value="00.000"/>
                                        <button class="w-100 btn btn-primary btn-lg bgr-color-boton btn-pago-distribucion" type="submit">
                                            Paypal <i class="fa-brands fa-paypal" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4" />
                    </form>
                </div>
            </div>
        </main>
    </div>


@endsection