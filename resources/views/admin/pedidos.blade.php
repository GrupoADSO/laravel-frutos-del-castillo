@extends('layouts.dashboard')

@section('contenido')

<section class="tabular--wrapper">

<h1 class="title header--title">Lista de pedidos registrados</h1>
        <table>
            <thead>
                <tr>
                    <th scope="col">Nombre del cliente</th>
                    <th scope="col">Fecha de la compra</th>
                    <th scope="col">Detalles pedido</th>
                    <th scope="col">Costo total</th>
                    <th scope="col">Estado del pedido</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($compras as $compra)
                    <tr>
                        <td>{{ $compra->usuario->nombre }} {{ $compra->usuario->apellido }}</td>
                        <td>{{$compra->fecha_hora}}</td>
                        <td>{{$compra->comentario}}</td>
                        <td>{{$compra->costo_total}}</td>
                        <td>Por validar</td>
                        <td>
                            <form action="{{ route('gestionar-pedido',  $compra->id) }}" style="margin: 0">
                                @csrf
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</section>
@endsection