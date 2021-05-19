
@extends('adminplantilla')

@section('content')

<!------------------------content------------------------------------>
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
            Destino
        </th>
        <th>
            Alojamiento
        </th>
        <th></th>
        <th>Acciones</th>
        <th></th>
    </tr>

  

    
    @foreach($query AS $c)
    <?php  $var=$c ->id.",'".$c -> destino."','".$c -> estadia."',".$c -> costo_persona.",'".$c -> descripcion."','".$c -> img."','".$c -> created_at."','".$c -> updated_at."'";?>
    
    <tr>
        <td id="id_alojamiento{{ $c -> id }}" name="">{{ $c -> id }}</td>
        <td id="ubi_alojamiento{{ $c -> id }}" name="">{{ $c -> destino }}</td>
        <td id="ubi_alojamiento{{ $c -> id }}" name="">{{ $c -> estadia }}</td>
        <!---la ubicacion se pasa de php a javascript con comillas por que es una variable tipo texto-->
        <!-- <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="seleccProduct(<?php echo $c -> id?>,'<?php echo $c -> destino?>','<?php echo $c -> estadia?>',<?php echo $c -> costo_persona?>,'<?php echo $c -> descripcion?>','<?php echo $c -> img?>')">Ver</a></td> -->
        <td><a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="seleccProduct(<?php echo $var?>)">Ver</a></td>
        <td><a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalModificar" onclick="editProdut(<?php echo $var?>)">Actualizar</a></td>
        <td><a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalBorrar" onclick="seleccBorrar(<?php echo $c -> id?>)">Eliminar</a></td>
    </tr>
    @endforeach
    <!-- <tr>
        <td></td>
        <td><a href="" class="btn btn-success ">Agregar alojamiento</a></td>
        <td></td>
        <td></td>
        <td></td>
    </tr> -->
</table>
<br>
<br>
<br>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ver</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="GET" action="form">

        <table class="table">
          <!-- <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Contenido</th>
            </tr>
          </thead> -->
          <tbody>
            <tr>
              <td ><h5><strong>Id:</strong></h5></td>
              <td><h5 id="txtId" name="txtId"></h5></td>
            </tr>
            <tr>
              <th><h5><strong>Ubicacion</strong></h5></th>
              <td><h5 id="txtUbicacion" name="txtUbicacion"></h5></td>
            </tr>
            <tr name="modAlojamiento" style="display:contents">
              <th><h5><strong>Alojamiento</strong></h5></th>
              <td><h5 id="txtAlojamiento" name="txtAlojamiento"></h5></td>
            </tr>
            <tr>
              <th><h5><strong>Costo</strong></h5></th>
              <td><h5 id="txtCosto" name="txtCosto"></h5></td>
            </tr>
            <tr>
              <th><h5><strong>Fecha de Creación</strong></h5></th>
              <td><h5 name="txtFcreacion"></h5></td>
            </tr>
            <tr>
              <th><h5><strong>Fecha de Actualización</strong></h5></th>
              <td><h5 name="txtFupdate"></h5></td>
            </tr>
            <tr>
              <th><h5><strong>Descripcion</strong></h5></th>
              <td><h5 id="txtDescripcion" name="txtDescripcion"></h5></td>
            </tr>
            <tr>
              <th><h5><strong>Imagen</strong></h5></th>
              <td><img id="txtImagen" name="txtImagen" width="100%" src=""></img></td>
            </tr>

          </tbody>
        </table>
        </form>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!--endmodal-->


<!-- Modal borrar-->
<div class="modal fade" id="ModalBorrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalBorrarLabel">Advertencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p name=lblAdvertencia>¿Esta seguro de borrar este registro con id: {{ $c -> id}}?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        
        <form name=formBorrar method="" action="{{ url ('admin/') }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Borrar Registro</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
<!--endmodal-->


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
            <label for="Ubicacion" class="form-label"><strong>Ubicacion</strong></label>
            <!-- <input type="text" class="form-control" id="ipUbicacion1" name="ipUbicacion1" placeholder="Ingrese el nombre de la ubicación"> -->
            <select id ="selDestino1" name="selDestino1" class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">La Pintada</option>
              <option value="2">Amaga</option>
              <option value="3">Jardín</option>
              <option value="4">Santa Fe de Antioquia</option>
              <option value="5">San Jerónimo</option>
            </select>
          </div>
          <div class="mb-1 col-12">
            <label for="Alojamiento" class="form-label"><strong>Alojamiento</strong></label>
            <input type="text" class="form-control" id="ipAlojamiento1" name="ipAlojamiento1" placeholder="Ingrese el nombre del alojamiento">           
          </div>
          <div class="mb-1 col-12">
            <label for="Costo" class="form-label"><strong>Costo</strong></label><label for="Costo" class="obligatorio form-label">*</label>
            <input type="number" class="form-control" id="ipCosto1" name="ipCosto1" placeholder="Ingrese el costo del plan">           
          </div>
          <div class="mb-2 col-12">
            <label for="descripcion" class="form-label"><strong>Descripción</strong></label>
            <textarea class="form-control" id="ttaDescripcion1" name="ttaDescripcion1" rows="3" placeholder="Ingrese la descripción del plan"></textarea>
          </div>
          <div class="mb-1 col-12">
            <label for="imagen" class="form-label"><strong>Imagen</strong></label>
            <input type="text" class="form-control" id="ipImagen1" name="ipImagen1" placeholder="Ingrese la imagen 'por ahora'" value="https://loremflickr.com/320/240/travel">           
          </div>
          <div class="mb-1 col-12">
            <input type="file" class="form-control" id="_file_" name="archivo" placeholder="" value="https://loremflickr.com/320/240/travel">      
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


<!-- Modal de modificar -->
<div class="modal fade" id="modalModificar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalModificarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalModificar">Agregar Alojamiento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" name="formActualizar" action="">
          <!--token forma 1-->
          @csrf
          <!--token forma 2-->
          <!-- <input name="_token" type="hidden" value="{{ csrf_token() }}"> -->

          @method('PUT')

          <div class="mb-1 col-12">
            <h5 id=h5id name="h5id"> </h5>
          </div>
          <div class="mb-1 col-12">
            <label for="Ubicacion" class="form-label"><strong>Ubicacion</strong></label>
            <select id ="selDestino" name="selDestino" class="form-select" aria-label="Default select example">
              <option selected>Open this select menu</option>
              <option value="1">La Pintada</option>
              <option value="2">Amaga</option>
              <option value="3">Jardín</option>
              <option value="4">Santa Fe de Antioquia</option>
              <option value="5">San Jerónimo</option>
            </select>
            <!-- <input type="text" class="form-control" id="ipUbicacion" name="ipUbicacion" placeholder="Ingrese el nombre de la ubicación"> -->
          </div>
          <div class="mb-1 col-12" name="modAlojamientotxt" style="display:contents">
            <label for="Alojamiento" class="form-label"><strong>Alojamiento</strong></label>
            <input type="text" class="form-control" id="ipAlojamiento" name="ipAlojamiento" placeholder="Ingrese el nombre del alojamiento">           
          </div>
          <div class="mb-1 col-12">
            <label for="Costo" class="form-label"><strong>Costo</strong></label>
            <input type="number" class="form-control" id="ipCosto" name="ipCosto" placeholder="Ingrese el costo del plan">           
          </div>
          <div class="mb-2 col-12">
            <label for="descripcion" class="form-label"><strong>Descripción</strong></label>
            <textarea class="form-control" id="ttaDescripcion" name="ttaDescripcion" rows="3" placeholder="Ingrese la descripción del plan"></textarea>
          </div>
          <div class="mb-1 col-12">
            <label for="imagen" class="form-label"><strong>Imagen</strong></label>
            <input type="text" class="form-control" id="ipImagen" name="ipImagen" placeholder="Ingrese la imagen 'por ahora'">           
          </div>
          <br>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Añadir </button>    
        </form>
      </div>
     
    </div>
  </div>
</div>
<!--fin de modal de modificar--->


@endsection






<!----------------------------endcontent-------------------------------->




