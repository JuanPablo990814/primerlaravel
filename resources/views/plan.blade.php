@extends('plantilla')

@section('content')

<div class="planseparado">
    <div class="container">
        <div class="titulo">
            <br>
            <h1>{{ $query[0] -> destino }} - {{ $query[0] -> titulo }}</h1>
            <h4>Precio: {{ $query[0] -> costo_persona }}</h4>
            <br>
        </div>
        <br>
        <img src="{{ $query[0] -> img }}" class="d-block w-100" alt="...">
        <p>{{ $query[0] -> descripcion}}</p>
    </div>
    <form action="{{ url('/inscripcion') }}/{{ $query[0] -> url }}">
        <button type="submit" class="btn btn-primary">¡Inscribete ahora!</button>
    </form>
    <br><br><br>
</div>
@endsection