@extends('plantilla')

@section('content')

<h2 id="txtalojamiento">Recorridos</h2>
<br>
        <div class="row">
            <div class="col">
                <ul class="planes">
                    @foreach($query AS $c)
                    <li data-bs-toggle="modal" data-bs-target="#modalInscribir">
                        <div class="foto">
                            <a>
                                <img src="{{ $c -> foto }}" alt="{{ $c -> ubicacion }}" title="{{ $c -> ubicacion }}"/>
                            </a>
                            <span>{{ $c -> costo_persona }} por persona</span>
                        </div>
                        <div class="descripcion">
                            <h2 class="h5Recorridos">{{ $c -> ubicacion }}</h2>
                            <p>{{ $c -> descripcion }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="modalInscribir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalInscribirLabel">Reservar: no terminado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="mb-1 col-12">
                <label for="Nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="Nombre" placeholder="Ingrese su nombre completo">
            </div>
            <div class="mb-1 col-12">
                <label for="Numero" class="form-label">Numero de contacto</label>
                <input type="number" class="form-control" id="Numero" placeholder="Ingrese su numero de contacto">
            </div>
            <div class="mb-2 col-12">
                <label for="Email" class="form-label">Email</label>
                <input type="text" class="form-control" id="Email" placeholder="Ingrese su email">
            </div>
            <div class="mb-2 col-12">
                <label for="emergency" class="form-label">Nombre del Contacto de Emergencia</label>
                <input type="text" class="form-control" id="emergency" placeholder="Ingrese Nombre de su Contacto de Emergencia">
            </div>
            <div class="mb-2 col-12">
                <label for="emergencynumber" class="form-label">Numero de contacto de emergencia</label>
                <input type="number" class="form-control" id="emergencynumber" placeholder="Ingrese el numero del contacto de emergencia">
            </div>
                                
            <div class="col-12">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnForm"class="btn btn-primary">Enviar</button>
            </div>        
        </div>

    </div>
  </div>
</div>


@endsection