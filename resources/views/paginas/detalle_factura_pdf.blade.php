
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
    
            .titulo{
                text-align: center
            }
            
            span{
                font-size: 25px;
            }
    
         .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }
    
    .titulo__header {
        font-family: "boring-sans-atrial";
        font-weight: bold;
        font-size: 3rem;
        color: var(--color-secondary);
        margin: 0px;
    }
    
    .titulo__header-button {
        font-size: 4rem;
        text-align: center;
        margin: .5em 0;
    }
    
    .text-muted-longitud {
        width: 140px;
        height: 13px;
        display: inline-block;
        overflow: hidden;
        writing-mode: lr;
        text-overflow: ellipsis;
        text-wrap: nowrap;
    }
    
    .main-content h4,
    .main-content h6,
    .main-content span {
        color: var(--color-secondary);
    }
    
    .color-text-factura {
        color: var(--color-secondary);
    }
    
    .metodo__pago-efecto:hover {
        background-color: var(--color-secondary);
    }
    
    .needs-validation input,
    .needs-validation span {
        border-color: var(--color-primary);
    }
    
    .bgr-color-span,
    .bgr-color-boton {
        background: var(--color-primary);
        color: var(--color-neutral);
    }
    
    .bgr-color-boton {
        border: none;
    }
    
    .bgr-color-boton:hover {
        background: var(--color-secondary);
    }
    
    
    .metodo__pago {
        display: flex;
        flex-direction: column;
    }
    
    .btn-pago-distribucion {
        display: flex;
        justify-content: space-around;
        gap: 5em;
    }
    
    .tarjeta {
        width: 250px;
        height: 60px;
        background-color: var(--color-primary);
        border-radius: 10px;
        margin: 5px;
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    
    .tarjeta label,
    .tarjeta a {
        font-size: 1.2rem;
        color: var(--color-neutral);
    
    }
    
    .tarjeta a {
        width: 100%;
        display: flex;
        text-decoration: none;
        justify-content: space-around;
        gap: 5em;
    }
    
    .tarjeta i {
        font-size: 1.5rem;
        color: var(--color-neutral);
        display: flex;
        justify-content: center;
    }
    
    .text-muted-color,
    .form-label-color {
        color: var(--color-secondary-opacity) !important;
    }
    
    .form-label-color {
        font-size: 1.2rem;
    }
        </style>
    </head>
    <body>
        
        <div class="container">
            <h1 class="titulo__header titulo__header-button titulo">Detalles de tu compra</h1>
            <main class="main-content">
                <div class="row g-5">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="color-text-factura" >Productos comprados</span><br><br>
                            <span class="color-text-factura" >Fecha y hora de la compra: <?php echo date('Y-m-d H:i:s'); ?></span>
                        </h4>
                        <ul class="list-group mb-3">
                        </ul>
    
                    </div>
                    <div class="col-md-7 col-lg-8">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <span class="color-text-factura" >Nombre: {{$datos->nombre}}</span>
                                </div><br>
    
                                <div class="col-sm-6">
                                    <span for="lastName" class="color-text-factura">Apellido: {{$datos->apellido}}</span>
                                </div><br>
                                
                                <div class="col-sm-6">
                                    <span for="lastName" class="color-text-factura">Email: {{$datos->email}}</span>
                                </div><br>
    
                                <div class="col-sm-6">
                                    <span for="lastName" class="color-text-factura">Fecha de nacimiento: {{$datos->fecha_nacimiento}}</span>
                                </div><br>
    
                                <div class="col-sm-6">
                                    <span for="lastName" class="color-text-factura">Telefono: {{$datos->celular}}</span>
                                </div><br>
    
                            </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="{{ 'assets/dist/js/bootstrap.bundle.min.js' }}"></script>
    </body>

    </html>




