@extends('adminplantilla')

@section('content')

@if (session('msg'))
    <div class="alert {{ session('class') }}">
        {{ session('msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </div>
@endif

<div class="admin">
<br>
<div class="container">
<h3>Pedidos</h3>

<table class="table table-striped border">
    <tr class="table-secondary">
        <th>
            Id
        </th>
        <th>
            Id Factura
        </th>
        <th>
            Email del Cliente
        </th>
        <th>
            Producto
        </th>
        <th>
            Num. Personas
        </th>
        <th>
            Valor 1 persona
        </th>
        <th>
            Valor Total
        </th>
        <th>
            Eliminar
        </th>
    </tr>
    @foreach($query AS $c)
    <tr>
        <td>
            {{ $c -> id }}
        </td>
        <td>
            {{ $c -> factura_id }}
        </td>
        <td>
            {{ $c -> email }}
        </td>
        <td>
            {{ $c -> producto }}
        </td>
        <td>
            {{ $c -> numero_de_personas_adicionales }}
        </td>
        <td>
            {{ $c -> valor_una_persona }}
        </td>
        <td>
            {{ $c -> total }}
        </td>
        <td>
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalBorrar" onclick=seleccBorrarItem(<?php echo $c -> id?>)">Eliminar</a>
        </td>
    
    </tr>
    @endforeach
</table>

</div>
</div>

<!-- Modal borrar-->
<div class="modal fade" id="ModalBorrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalBorrarLabel">Advertencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p name=lblAdvertencia>¿Esta seguro de borrar este registro con id:?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        
        <form name=formBorrar method="" action="{{ url ('/eliminarPedido')}}/">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Borrar Registro</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
<!--endmodal-->


<!--  -->

@endsection