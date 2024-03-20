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
                        @if ($compra->estado == 1)
                        <td>Por validar</td>   
                        @elseif($compra->estado == 0)
                        <td>Confirmado</td>   
                        @endif
                        <td>
                            <form action="{{ route('gestionar-pedido',  $compra->id) }}" style="margin: 0">
                                @csrf
                                <button>
                                    <i class="fa-solid fa-list-check icon"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</section>
@endsection