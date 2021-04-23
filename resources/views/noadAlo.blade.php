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
<h3>Alojamientos</h3>
<a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Agregar alojamiento</a>
<br><br>
<table class="table table-striped border">
    <tr class="table-secondary">
        <th>
            Id
        </th>
        <th>
            Ubicacion
        </th>
        <th></th>
        <th>Acciones</th>
        <th></th>
    </tr>


</table>
<br>
</div>
</div>

<!-- Modal de añadir -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Alojamiento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ url('/admin') }}">
          <!--token forma 1-->
          <!-- @csrf -->
          <!--token forma 2-->
          <input name="_token" type="hidden" value="{{ csrf_token() }}">

          <div class="mb-1 col-12">
            <label for="Ubicacion" class="form-label">Ubicacion</label>
            <input type="text" class="form-control" id="ipUbicacion1" name="ipUbicacion1" placeholder="Ingrese el nombre de la ubicación">
          </div>
          <div class="mb-1 col-12">
            <label for="Costo" class="form-label">Costo</label><label for="Costo" class="obligatorio form-label">*</label>
            <input type="number" class="form-control" id="ipCosto1" name="ipCosto1" placeholder="Ingrese el costo del plan">           
          </div>
          <div class="mb-2 col-12">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="ttaDescripcion1" name="ttaDescripcion1" rows="3" placeholder="Ingrese la descripción del plan"></textarea>
          </div>
          <div class="mb-1 col-12">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="text" class="form-control" id="ipImagen1" name="ipImagen1" placeholder="Ingrese la imagen 'por ahora'" value="https://loremflickr.com/320/240/travel">           
          </div>
          <br>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Añadir </button>    
        </form>
      </div>
     
    </div>
  </div>
</div>
<!--fin de modal de añadir--->

@endsection