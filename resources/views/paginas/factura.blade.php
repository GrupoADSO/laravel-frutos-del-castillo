@extends('layouts.layout')


@section('titulo', 'factura')

@section('contenido')

    <div class="contenedor">

        <section class="contenedor__factura">
            <h1 class="titulo__header">Datos Generales</h1>

            <div class="separador">
                <form action="#" class="form_control">

                    <div class="sub__contenedor__general">
                        <p class="texto">Nombre: <input type="text" class="control__input" /></p>

                        <p class="texto">Telefono: <input type="tel" class="control__input" /></p>

                    </div>

                    <div class="check">
                        <p class="texto"><input type="radio" class="input__radio" name="nn" id="l"
                                value="l" />
                            Recoger en tienda</p>
                        <p class="texto"><input type="radio" class="input__radio" name="nn" id="m"
                                value="m" />
                            Domicilio</p>

                        <div class="sub__informacion">
                            <a href="#"><i class="fa-solid fa-location-dot"></i></a>
                            <h3>los almendros</h3>
                            <h4>Instrucción de entrega</h4>
                            <textarea class="control__input control__textarea" cols="30" rows="2" placeholder="opcional"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <section class="pago separador">
                <h2 class="titulo__header">Metodo de Pago</h2>
                <div action="#" class="form__control subcontenedor__pago">
                    <div class="titulos__pago">
                        <p class="texto">Disponible</p>
                        <p class="texto">disponible</p>
                    </div>
                    <div class="metodo__pago ">
                        <div class="tarjeta">
                            <i class="fa fa-usd center"></i>
                        </div>

                        <div class="metodo__pago">
                            <div class="tarjeta">
                                <i class="fa fa-credit-card-alt center"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </section>

        <section class="detafac">
            <h1>Detalle de la factura</h1>
            <table class="tbl__detalle__factura">
                <tr class="tbl__contenido-titulo">
                    <th>productos</th>
                    <th>subtotal</th>
                </tr>
                <tr class="tbl__contenido-text tbl__linea">
                    <td class="tbl__contenido-producto">
                        <p>hamburguesa x1</p>
                        <p>hamburguesa x1</p>
                        <p>hamburguesa x1</p>
                        <p>hamburguesa x1</p>
                        <p>hamburguesa x1</p>
                        <p>hamburguesa x1</p>
                        <p>hamburguesa x1</p>
                    </td>
                    <td>$25.000</td>
                </tr>
                <tr class="tbl__contenido-text">
                    <td>subtotal</td>
                    <td>$25.000</td>
                </tr>
                <tr class="tbl__contenido-text">
                    <td>Envio</td>
                    <td>Recoger o enviar</td>
                </tr>
                <tr class="tbl__contenido-text">
                    <th>Total</th>
                    <th>$25.000</th>
                </tr>
            </table>
            <div class="btnrp-container">
                <button class="btn-rp">Realizar Pago</button>
            </div>
        </section>

    </div>

@endsection
