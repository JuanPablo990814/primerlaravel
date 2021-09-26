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
            Titulo
        </th>
        <th>
            Fecha de Creación
        </th>
        <th>
            id
        </th>
        <th>
            Estado Actual
        </th>
        <th>
            Acciones
        </th>
        <th>
            
        </th>
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
        <td>
            {{ $c -> created_at }}
        </td>
        <td>
            {{ $c -> id }}
        </td>
        <td>
            <form action="{{url('cambiarEstado')}}/{{ $c -> id }}">
                <!-- No es necesario crear el input hidden ya que con el metodo findorfail ya obtengo los datos de esa id -->
                <!-- <input id="{{ $c -> id }}" name="{{ $c -> id }}" type="hidden" value="<?php //echo $c -> estado_fac?>"> -->
                <?php 
                    if($c -> estado_fac=='Reservado Actualmente'){
                        $estiloBoton='estilo-botones';
                    }else{
                        $estiloBoton='btn-dark'; 
                    }
                ?>
                <button type="submit" class="btn {{$estiloBoton}}">{{ $c-> estado_fac }}</button>
                
            </form>
        </td>
        <td>
            <form action="{{url('items')}}/{{$c -> id}}">
                <button class="btn btn-primary" >Ver</button>
            </form>
        </td>
        <td>
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalBorrar" onclick="seleccBorrarReserva(<?php echo $c -> id?>)">Eliminar</a>
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
        <p name=lblAdvertencia>¿Esta seguro de borrar este registro con id:</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        
        <form name=formBorrar method="" action="{{ url ('BorrarRegistro') }}">
          @csrf
          <input id="idfactura" name="idfactura" type="hidden" value="">
          <button type="submit" class="btn btn-danger">Borrar Registro</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
<!--endmodal-->

@endsection