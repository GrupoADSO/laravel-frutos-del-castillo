<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .contenedor__factura-pdf {
            width: 600px;
            /* text-align: center;   */
            padding: 0 2em;
        }

        .session__factura-info{
            position: relative;
        }

        .titulo {
            margin: 0;
            text-align: left;
        }

        .texto-center{
            text-align: left;
        }
        .texto-left{
            text-align: left;
        }

        .texto-left-position{
            position: absolute;
            top: -15px;
            right: 0;
        }
        .texto-margen{
            margin: 0;
        }
        .codigo__factura{
            display: flex;
            width: 100%
        }

        span {
            font-size: 25px;
        }

        .titulo__header {
            font-weight: bold;
            font-size: 1.6rem;
            margin: 0px;
        }

        .color-text-factura {
            color: color: black;
            ;
        }

        .tbl-pdf{
            margin-top: 1em;
            width: 100%;
        }

        .tbl-pdf  td{
            height: 2em;
        }

        .body-tbl td { 
            text-align: center;
        }
        
        .footer-tbl th,
        .footer-tbl td{
            text-align: right;
        }
        


    </style>
</head>

<body>

    <div class="contenedor__factura-pdf">
        <section>
            <h1 class="titulo__header titulo">Pizzeria la romana</h1>

            <div class="session__factura-info">
                <p class="texto-center">Nit: 00000000</p>
                <p class="texto-left-position">Codigo: FV0001</p>
            </div>

            <p class="color-text-factura texto-margen">Fecha: {{ $comprasUsuario->fecha_hora }}</p>
            <hr>
            <section>
                <h2 class="titulo">Datos del comprador</h2>
                <p class="color-text-factura">Cliente: {{ $datosUsuario->nombre }}
                    {{ $datosUsuario->apellido }}</p>
                <p for="lastName" class="color-text-factura">Email: {{ $datosUsuario->email }}</p>
                <p for="lastName" class="color-text-factura">Telefono: {{ $datosUsuario->celular }}</p>
            </section>
        </section>

        <section>
            <h3 class="color-text-factura titulo">Productos comprados</h4>
                <table class="tbl-pdf">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Producto</th>
                            <th>Tamaño</th>
                            <th>Cantidad</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>
                    <tbody class="body-tbl">
                        {{ $contador = 1 }}
                        @foreach ($facturaUsuario as $datos)
                        <tr>
                            <td>{{ $contador }}</td>
                            <td>{{ $datos->nombre_producto  }}</td>
                            <td>{{ $datos->producto->size }}</td>
                            <td>{{ $datos->cantidad_producto }}</td>
                            <td>{{ $datos->subtotal }}</td>
                            <td>{{ $datos->iva }}</td>
                            {{ $contador++ }}
                        </tr>
                            @endforeach
                    </tbody>
                    <tfoot class="footer-tbl">
                        <th colspan="3">Total</th>
                            <td>{{ $comprasUsuario->costo_total }}</td>
                    </tfoot>
                </table>
        </section>

    </div>
</body>

</html>
