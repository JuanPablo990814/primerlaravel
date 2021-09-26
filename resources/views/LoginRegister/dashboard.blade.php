@extends('plantilla2')

@section('content')

<div class="admin">
<br>
<div class="container">
<h3>Mis Pedidos</h3>

<table class="table table-striped border">
    <tr class="table-secondary">
        <th>
            Fecha de Reserva
        </th>
        <th>
            Hora de Reserva
        </th>
        <th>
            Nombre del Cliente
        </th>
        <th>
            Num Contacto del Cliente
        </th>
        <th>
            Plan
        </th>
        <!-- <th>
            Acciones
        </th>
        <th>
            
        </th> -->
    </tr>
    @foreach($query AS $c)
    <tr>
        <td>
            {{ $c -> fechaReserva }}
        </td>
        <td>
            {{ $c -> horaReserva }}
        </td>
        <td>
            {{ $c -> name }}
        </td>
        <td>
            {{ $c -> numero }}
        </td>
        <td>
            {{ $c -> titulo }}
        </td>
        <!-- <td>
            <form action="{{url('items')}}/{{$c -> id}}">
                <button class="btn btn-primary" >Ver</button>
            </form>
        </td>
        <td>
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalBorrar" onclick="seleccBorrarReserva(<?php echo $c -> id?>)">Eliminar</a>
        </td> -->
    
    </tr>
    @endforeach
</table>

</div>
</div>

@endsection