@extends('plantilla2')
@section('content')
<div class="registro">
    
    <div class="container">
        <div class="row vh-100 justify-content-center align-items-center">
            <form method="post" action="{{ url('register') }}">
                @csrf
                <h1>Registro de usuarios</h1>
                <br>
                <div class="mb-4 col-sm-5">
                    <label for="inNombre">Nombre Completo</label>
                    <input id="inNombre" name="inNombre" class="form-control" type="text" placeholder="Nombre Completo" aria-label="default input example" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="mb-4 col-sm-5">
                    <label for="inNumero">Numero de contacto</label>
                    <input id="inNumero" name="inNumero" class="form-control" type="number" placeholder="Numero de contacto" aria-label="default input example" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="mb-4 col-sm-5">
                    <label for="inEmail">Correo Electronico</label>
                    <input id="inEmail" name="inEmail" class="form-control" type="text" placeholder="Email" aria-label="default input example" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="mb-4 col-sm-5">
                    <label for="inDireccion">Dirección</label>
                    <input id="inDireccion" name="inDireccion" class="form-control" type="text" placeholder="Direccion" aria-label="default input example" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="mb-4 col-sm-5">
                    <label for="inNombreEmergencia">Nombre Completo de Contacto de emergencia</label>
                    <input id="inNombreEmergencia" name="inNombreEmergencia" class="form-control" type="text" placeholder="Nombre Completo de contacto de Emergenciao" aria-label="default input example" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="mb-4 col-sm-5">
                    <label for="inNumeroEmergencia">Numero de contacto de Contacto de emergencia</label>
                    <input id="inNumeroEmergencia" name="inNumeroEmergencia" class="form-control" type="number" placeholder="Numero de contacto de Emergencia" aria-label="default input example" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="mb-4 col-sm-5">
                    <label for="InpPassword">Contraseña</label>
                    <input id="InpPassword" name="InpPassword" class="form-control" type="password" placeholder="Contraseña" aria-label="default input example" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="mb-4 col-sm-5">
                    <label for="InpPasswordConfirm">Confirmar Contraseña</label>
                    <input id="InpPasswordConfirm" name="InpPasswordConfirm" class="form-control" type="password" placeholder="Confirmar Contraseña" aria-label="default input example" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="mb-4 col-sm-5">
                    <button type="submit" class="btn btn-primary">Registrarse</button>
                </div>
                <br>
            </form>
        </div>
        <br><br><br>
    </div>
</div>
@endsection