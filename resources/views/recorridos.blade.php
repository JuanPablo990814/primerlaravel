@extends('plantilla')

@section('content')
<!-- filtros -->
<div class="row ">
  <div class="col-4 filtrostyle">

    <h5 class="titulo-texto">Filtros</h5>
    <div class="dropdown">
          <a class="btn btn-dark dropdown-toggle botonancho" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            Tipo de plan
          </a>

          <ul class="dropdown-menu botonancho" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="{{ url('/') }}">Alojamiento</a></li>
            <li><a class="dropdown-item" href="{{ url('/recorridos') }}">Recorridos</a></li>
            <li><a class="dropdown-item" href="{{ url('/tours') }}">Tours</a></li>
          </ul>
    </div>
    <h5 class="titulo-texto">Presupuesto</h5>
    <form action="{{ url('/filtroRe') }}">
    @csrf
    <div class="input-group mb-3 botonancho">
      <span class="input-group-text">$</span>
      <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)" id="filtrodinero" name="filtrodinero" required>
      <span class="input-group-text">.00</span>
    </div>
      <button type="submit" class="btn btn-primary" id="btnfiltrar">Añadir </button>
      <a type="submit" class="btn btn-primary" id="btnfiltrar" href="{{ url('/recorridos') }}">Quitar Filtros </a> 
    </form>
    <br><br>  
  </div>

  <div class="col-7">
   
  </div>
</div>
<br>
<!-- endfiltros -->

<h2 id="txtalojamiento">Recorridos</h2>
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