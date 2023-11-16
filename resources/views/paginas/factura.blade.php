@extends('layouts.layout')


@section('titulo', 'factura')

@section('contenido')

<div class="contenedor__principal__factura">

    <section class="contenedor__factura">
        <h1 class="titulo__header">Datos Generales</h1>

        <section class="separador">
            <form action="#" class="form_control">

                <div class="sub__contenedor__general">
                    <p class="texto">Nombre: <input type="text" class="control__input" name id /></p>

                    <p class="texto">Telefono: <input type="tel" class="control__input" name id /></p>

                </div>

                <div class="check">
                    <p class="texto"><input type="radio" class="input__radio" name="nn" id="l" value="l" />
                        Recoger en tienda</p>
                    <p class="texto"><input type="radio" class="input__radio" name="nn" id="m" value="m" />
                        Domicilio</p>

                    <div class="sub__informacion">
                        <a href="#"><i class="fa-solid fa-location-dot"></i></a>
                        <h2>los almendros</h3>
                            <h3>Instruccion de entrega</h3>
                            <textarea name class="control__input control__textarea" id cols="30" rows="2"
                                placeholder="opcional"></textarea>
                    </div>
                </div>
        </section>
        </form>

        <section class="cupon separador">
            <h2 class="titulo__header">Cupon</h1>
                <form action="#" class="form_control">
                    <div class="check">
                        <p class="texto"><input type="radio" class="input__radio" name="desicion" id />
                            No
                            tengo cupon</p>
                        <p class="texto"><input type="radio" class="input__radio" name="desicion" id />
                            Si
                            tengo</p>

                        <div class="sub__cupon">
                            <input type="text" class="input__text" name id placeholder="codigo..">
                            <button class="btn__val">Validar</button>
                        </div>
                    </div>
        </section>
        </form>

        <section class="pago separador">
            <h2 class="titulo__header">Metodo de Pago</h2>
            <form action="#" class="form__control subcontenedor__pago">
                <div class="titulos__pago">
                    <p class="texto">Disponible</p>
                    <p class="texto">disponible</p>
                </div>
                <div class="metodo__pago ">
                    <div class="tarjeta">
                        <i class="fa fa-usd center"></i>
                        <input type="radio" class="input__radio" name="pago" id>
                    </div>

                    <div class="metodo__pago">
                        <div class="tarjeta">
                            <i class="fa fa-credit-card-alt center"></i>
                            <input type="radio" class="input__radio" name="pago" id>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </section>

    <section class="resumen__factura">
        <div class="detafac">
            <div class="cardDF">
                <div class="content">
                    <h2>Detalles de la Factura</h2>
                </div>
                <div class="texto__factura">
                    <h3>Productos</h3>
                    <h3>Subtotal</h3>
                </div>
                <div class="linea"></div><br>
                <div class="texto__factura">
                    <h3>salchipapa X3</h3>
                    <h3>$ 25.000</h3>
                </div>
                <div class="linea"></div><br>
                <div class="texto__factura">
                    <h3>Envio</h3>
                    <h3>Domicilio</h3>
                </div>
                <div class="linea"></div><br>
                <div class="texto__factura">
                    <h3>Subtotal</h3>
                    <h3>$ 75.000</h3>
                </div>
                <div class="linea"></div><br>
                <div class="texto__factura">
                    <h3>Total</h3>
                    <h3 class="total">$ 75.0000</h3>
                </div>
                <div class="linea"></div><br>
                <div class="btnrp-container">
                    <button class="btn-rp">Realizar Pago</button>
                    <div>

    </section>

</div>
@endsection
