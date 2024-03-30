@extends('layouts.error')
@section('errores')
<div class="container">
    <h2 id="oops" inert>OOPS!</h2>
    <h4 id="error" inert>Error 404 : Pagina no encontrada</h4>
    <a href="{{ route('inicio') }}" class="btn__inicio">Volver a casa</a>
</div>
@endsection
