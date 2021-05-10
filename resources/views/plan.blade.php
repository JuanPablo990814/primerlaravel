@extends('plantilla')

@section('content')

<div class="planseparado">
    <div class="container">
        <div class="titulo">
            <br>
            <h1>{{ $query -> estadia }}</h1>
            <h4>Precio: {{ $query -> costo_persona }}</h4>
            <br>
        </div>
        <br>
        <img src="{{ $query -> foto }}" class="d-block w-100" alt="...">
        <p>{{ $query -> descripcion}}</p>
    </div>
    
    <form>
        <button type="button" class="btn btn-primary">¡Inscribete ahora!</button>
    </form>
    <br><br><br>
</div>
@endsection