@extends('layouts.dashboard')

@section('contenido')


    <div class="tabular--wrapper">
        <form action="{{ route('usuarios-actualizar',encrypt($usuario->id)) }}" class="row" id="miFormulario" method="POST">
            @csrf
            <div class="col-6">
                <label for="nombre-input">Nombre</label>
                <input type="text" class="form-control form__control__input" name="nombre_persona" value="{{ $usuario->nombre }}" id="nombre-input">
            </div>

            <div class="col-6">
                <label for="apellido-input">Apellido</label>
                <input type="text" class="form-control form__control__input" name="apellido_persona" value="{{ $usuario->apellido }}" id="apellido-input">
            </div>

            <div class="col-6">
                <label for="telefono-input">Telefono</label>
                <input type="number" class="form-control form__control__input" name="telefono_persona" value="{{ $usuario->celular }}" id="telefono-input">
            </div>

            <div class="col-6">
                <label for="fecha-nacimiento-input">Fecha Nacimiento</label>
                <input type="text" class="form-control form__control__input" name="nacimiento_persona" value="{{ $usuario->fecha_nacimiento }}" id="fecha-nacimiento-input">
            </div>

            <div class="col-12">
                <label for="email-input">Correo</label>
                <input type="email" class="form-control form__control__input" name="email_persona" value="{{ $usuario->email }}" id="email-input">
            </div>

            <div class="g-4">
                <button class="btn__formulario-button" id="limpiar">Limpiar</button>
                    <button class="btn__formulario-button">Enviar</button>
            </div>
        </form>
    </div>


<section class="tabular--wrapper">
    <h1 class="title header--title">Usuarios registrados</h1>
    <table>
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Transaction Type</th>
                <th scope="col">Description</th>
                <th scope="col">Amount</th>
                <th scope="col">Categoty</th>
                <th scope="col">Status</th>
                {{-- <th scope="col">Action</th> --}}
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2023/05/01</td>
                <td>Expense</td>
                <td>Office Supplies</td>
                <td>$250</td>
                <td>Office Expenses</td>
                <td>Pending</td>
                {{-- <td>
                    <form action="#" method="GET" style="margin: 0">
                        <button>
                            <svg class="icon icon-tabler icon-tabler-pencil" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                <path d="M13.5 6.5l4 4" />
                            </svg>
                        </button>
                    </form>
                    <form action="#" method="POST" style="margin: 0">
                        <button>
                            <svg class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7l16 0" />
                                <path d="M10 11l0 6" />
                                <path d="M14 11l0 6" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                        </button>
                    </form>
                </td> --}}
                
            </tr>
        </tbody>
    </table>
</section>
<script>
    document.getElementById('limpiar').addEventListener('click', function(e) {
        e.preventDefault()
        document.getElementById('miFormulario').reset();
    });
</script>


@endsection