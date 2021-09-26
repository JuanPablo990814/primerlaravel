function cbUrl1(){
    //check = document.getElementById("cbUrl1")
    $(document).ready(function(){  
  
        $("#cbUrl1").click(function() {  
            if($("#cbUrl1").is(':checked')) {
                $("#ipFile1").hide();
                $("#ipImagen1").show();
                $("#ipImagen1").prop('required', true);
                $("#ipFile1").prop('required', false);
                // alert("Está activado");
                // console.log("Está activado");  
            } else {
                $("#ipImagen1").hide();
                $("#ipFile1").show();
                $("#ipImagen1").prop('required', false);
                $("#ipFile1").prop('required', true);
                // alert("No está activado");  
                // console.log("Está activado"); 
            }  
        });

        $("#btnAgregar").click(function(){
            if($("#cbUrl1").is(':checked')) {
                $("#ipFile1").hide();
                $("#ipImagen1").show();
                $("#ipImagen1").prop('required', true);
                $("#ipFile1").prop('required', false);
                // alert("Está activado");
                // console.log("Está activado");  
            } else {
                $("#ipImagen1").hide();
                $("#ipFile1").show();
                $("#ipImagen1").prop('required', false);
                $("#ipFile1").prop('required', true);
                // alert("No está activado");  
                // console.log("Está activado"); 
            }
        });
      
    });  
}

function cbUrl(){
    //check = document.getElementById("cbUrl1")
    $(document).ready(function(){  
  
        $("#cbUrl").click(function() {  
            if($("#cbUrl").is(':checked')) {
                $("#ipFile").hide();
                $("#ipImagen").show();
                $("#ipImagen").prop('required', true);
                $("#ipFile").prop('required', false);
                // alert("Está activado");
                // console.log("Está activado");  
            } else {
                $("#ipImagen").hide();
                $("#ipFile").show();
                $("#ipImagen").prop('required', false);
                $("#ipFile").prop('required', true);
                // alert("No está activado");  
                // console.log("Está activado"); 
            }  
        });

        $(".btn-ver").click(function(){
            if($("#cbUrl").is(':checked')) {
                $("#ipFile").hide();
                $("#ipImagen").show();
                $("#ipImagen").prop('required', true);
                $("#ipFile").prop('required', false);
                // alert("Está activado");
                // console.log("Está activado");  
            } else {
                $("#ipImagen").hide();
                $("#ipFile").show();
                $("#ipImagen").prop('required', false);
                $("#ipFile").prop('required', true);
                // alert("No está activado");  
                // console.log("Está activado"); 
            }
        });
      
    });  
}


cbUrl1()
cbUrl()