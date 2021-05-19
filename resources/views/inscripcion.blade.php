@extends("plantilla")

@section('content')

<div class="inscripcion">
    <div class="container">
        <h2>Inscripción - {{ $query[0] -> titulo }} en {{ $query[0] -> destino }}</h2>
        <br>
        <form>
            <button class="btn btn-primary">Login</button>
        </form>
        <br>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Desea incluir en su packete SIM CARDS con minutos incluidos.
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Transporte incluido "solo para planes con alojamiento".
            </label>
        </div>
        <br>

        <div class="row">
            <div class="col-3">
                <label for="inpNumeroPer" class="form-label"><strong>•Personas adiccionales a incluir en el plan</strong></label>
            </div>
            <div class="col-2">
                <input type="number" class="form-control" id="inpNumeroPer" name="inpNumeroPer" placeholder="" value="0" min="0" max="20">
            </div>
        </div>

        <label for="start"><strong>•Fecha de plan:</strong></label>
        
        <?php $fecha = date("Y-m-d");?>
        
        <!-- <input type="date" id="start" name="trip-start"
            value="<?php #echo $fecha;?>"
            min="<?php #echo $fecha;?>"> -->

        <?php

        ?>
        

    </div>
    <br><br><br><br>
</div>

@endsection