@extends("plantilla2")

@section('content')
<?php

    $array=[
        [7,'07:00 A.M.'],
        [8,'08:00 A.M.'],
        [9,'09:00 A.M.'],
        [10,'10:00 A.M.'],
        [11,'11:00 A.M.'],
        [12,'12:00 A.M.'],
        [13,'01:00 P.M.'],
        [14,'02:00 P.M.'],
        [15,'03:00 P.M.'],
        [16,'04:00 P.M.'],
        [17,'05:00 P.M.'],
        [18,'06:00 P.M.'],
        [19,'07:00 P.M.'],
        [20,'08:00 P.M.']
        ];

        $time = [];
            
        $currentDate = new DateTime();
        $currentDate->modify('+4 hours');
        $currentTime=(int)$currentDate->format('G');
            
        foreach ($array as $c):
            if($c[0] >= $currentTime):
                 array_push($time , [ $c[0],$c[1] ]);
            endif;
        endforeach;
        
        if(count($time)==0){
            $time = $array;
        }
        //dd($c[0],$currentTime);
        //dd($currentDate);
        //dd($selectedDate);
        //dd($currentTime);
        //dd($time);
    

?>



<div class="inscripcion">
    <div class="container">
        
        <h2>Inscripción - {{ $query[0] -> titulo }} en {{ $query[0] -> destino }}</h2>

        

        <br>
        <h5 id="AdverLogueo" class="tituloblanco">Para reservar es necesario estar logueado.</h5>
        <div class="row">
            <div class="col-sm-1" id=botones1>  
                <a class="btn btn-primary estilo-botones" id="btnLogin" href="{{ url('login') }}">Login</a>
            </div>
            <div class="col-sm-1">
                <!-- <form action="{{ url ('registro') }}">
                    <button class="btn btn-primary" id="btnRegistrase" href="{{ url('register') }}">Registrarse</button>
                </form> -->
                <a class="btn btn-primary estilo-botones" id="btnRegistro" href="{{ url ('registro') }}">Registro</a>
            </div>
        </div>
        <br>

        

        <form method="" action="{{ url ('/Inscripcion/Inscribiendo') }}">
            @csrf


            <input id="iduser" name="iduser" type="hidden" value="<?php echo $iduser?>">


            <?php 
            $varplan=$query[0]-> id_tipo;
            $label="";
            if($varplan==1){
                $type="checkbox";
                $label="Transporte incluido, de su casa hasta el lugar de alojamiento";
            } 
            else{

                $type="hidden";
                $label="";
            }
            ?>

            


            
            <div class="form-check">    
                <input class="form-check-input" type="<?php echo $type ?>" id="checkTransporte" name="checkTransporte" value="True">
                <label id="lblTransporte" class="form-check-label" for="checkTransporte">
                <?php echo $label?>
                </label>
            </div>
            
            <input id="prodId" name="prodId" type="hidden" value="{{ $query[0]-> id }}">
            <!-- input sin valor alguno en el backend -->
            <input id="costopersona" name="costopersona" type="hidden" value="{{ $query[0]-> costo_persona }}">

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkSim" name="checkSim" value="True">
                <label id="lblSims" class="form-check-label" for="checkSim">
                    Desea incluir en su packete SIM CARDS con minutos incluidos para cada persona.
                </label>
            </div>
            
            <br>

            <div class="row">
                <div class="col-sm-3">
                    <label id="lblPersonasAdicion" for="inpNumeroPer" class="form-label"><strong>•Personas adiccionales a incluir en el plan</strong></label>
                </div>
                <div class="col-2">
                    <input type="number" class="form-control" id="inpNumeroPer" name="inpNumeroPer" placeholder="" value="0" min="0" max="20">
                </div>
            </div>

            <?php $url =  "'".url('inscripcion')."/".$query[0] -> Url."'"; ?>
            <div class="row">
                <div class="col-sm-3">
                    <label id="lblFecha" for="start"><strong>•Fecha de plan</strong></label>
                </div>
                <div class="col-2">
                    <span id="fechaSeleccionada" name="fechaSeleccionada"></span>
                    <input type="text" id="datepicker1" name="datepicker1">
                </div>
            </div>
            <!-- onblur="javascript_to_php(<?php //echo $url?>)" -->
            <!-- <div class="row">
                <div class="col-sm-3"> 
                </div>-->
    
                <?php //$fecha = date("Y-m-d");?>
                <!-- <input type="date" id="start" name="trip-start"
                    value="<?php #echo $fecha;?>"
                    min="<?php #echo $fecha;?>"> -->
                <!-- <div class="col-2">
                    
                </div>
            </div> -->
            
            <br>
            <div class="row">
                <div class="col-sm-3">
                <label id="lblDate" for="selectDate" class="form-label"><strong>•Horario</strong></label>
                </div>
                <div class="col-2">
                    <select class="form-select" id="selectTime" name="selectTime" required>
                        <option selected disabled value="">Choose...</option>
                        <!-- @foreach($time as $t)
                        <option> <?php //echo $t[1]?> </option>
                        @endforeach -->
                    </select>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-2">
                
                </div>
                <div class="col-3">
                    <button id="btnInscripcion" class="btn btn-primary estilo-botones">Enviar Inscripción</button>
                </div>
            </div>
        </form>
    </div>
    <br><br><br><br>
</div>
 





<?php
// comprobar si tenemos los parametros w1 y w2 en la URL
if (isset($_GET["fecha"])){
    // asignar w1 y w2 a dos variables
    $phpVar1 = $_GET["fecha"];

    // mostrar $phpVar1 y $phpVar2
    echo "<p>Parameters: " . $phpVar1."</p>";
} else {
    echo "<p>No parameters</p>";
}
?>

@endsection