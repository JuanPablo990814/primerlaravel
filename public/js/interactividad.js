function Inscripcion(){
    idusuario = document.getElementById("iduser").value;
    if(idusuario==""){
        //forma de ocultar 1
        checkTransporte = document.getElementById("checkTransporte");
        checkTransporte.style.display = "none";
        checkSim = document.getElementById("checkSim");
        checkSim.style.display = "none";

        //forma de ocultar 2 con jquery
        $("#datepicker1").hide();
        $("#selectTime").hide();
        $("#btnInscripcion").hide();
        $("#lblDate").hide();
        $("#lblFecha").hide();
        $("#lblPersonasAdicion").hide();
        $("#inpNumeroPer").hide();
        $("#lblSims").hide();
        $("#lblTransporte").hide();
    }
}

function IncripcionUsuario(){
    idusuario = document.getElementById("iduser").value;
    if(idusuario!=""){
        $("#btnLogin").hide();
        $("#btnRegistro").hide();
        $("#AdverLogueo").hide();
    }
}



Inscripcion()
IncripcionUsuario()