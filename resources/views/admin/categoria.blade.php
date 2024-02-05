@extends('layouts.dashboard')


{{-- @section('titulo', 'Inicio') --}}

@section('contenido')

<section class="tabular--wrapper">


<div class="contendor__boton">
    <a class="btn__categoria" href="{{ route('crear-categoria') }}" >Crear Categoria</a>
</div>

<table>
    <thead>
        <tr>
            <th scope="col">Nombre Categoria</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach ($dataCategory as $category) --}}
        <tr>
            {{-- <td>{{ $category->nombre }}</td> --}}
            <td>Comidad</td>
            <td>
                <form action="#" method="GET" style="margin: 0">
                {{-- <form action="{{ route('categories.edit',$category->id)}}" method="GET" style="margin: 0"> --}}
                    {{-- @csrf --}}
                    <button>
                        <svg class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                            <path d="M13.5 6.5l4 4" />
                        </svg>
                    </button>
                </form>
                {{-- Eliminar --}}
                {{-- <form action="{{ url('categories',$category->id)}}" method="POST" style="margin: 0"> --}}
                <form action="#" method="POST" style="margin: 0">
                    {{-- @csrf
                    @method('DELETE') --}}
                    <button>
                        <svg class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
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
        {{-- @endforeach  --}}
    </tbody>
</table>

</section>


@endsection