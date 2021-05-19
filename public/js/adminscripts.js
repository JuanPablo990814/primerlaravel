//Alojamientos
function seleccProduct(id,ubicacion,alojamiento,costo,descripcion,imagen,fcreado,fupdate){
    console.log("|"+id +"|"+ubicacion+"|"+alojamiento+"|"+costo+"|"+descripcion+"|"+imagen);//imprimiendo en consola
    
    document.getElementsByName("modAlojamiento")[0].style.display="contents";
    document.getElementsByName("txtId")[0].textContent=id;
    document.getElementsByName("txtUbicacion")[0].textContent=ubicacion;
    document.getElementsByName("txtAlojamiento")[0].textContent=alojamiento;
    document.getElementsByName("txtCosto")[0].textContent=costo;
    document.getElementsByName("txtDescripcion")[0].textContent=descripcion;
    document.getElementsByName("txtImagen")[0].src=imagen;
    document.getElementsByName("txtFcreacion")[0].textContent=fcreado;
    document.getElementsByName("txtFupdate")[0].textContent=fupdate;
    
}

function editProdut(id,destino,alojamiento,costo,descripcion,imagen,fcreado,fupdate){
    console.log("|"+id +"|"+destino+"|"+alojamiento+"|"+costo+"|"+descripcion+"|"+imagen+"|"+fcreado+"|"+fupdate);

    url=window.location;
    url=url["href"]+"/"+id;
    document.getElementsByName("modAlojamientotxt")[0].style.display="contents";
    document.getElementsByName("formActualizar")[0].action=url;
    document.getElementsByName("h5id")[0].textContent=id;
    switch(destino){
        case ("La Pintada"):
            document.getElementsByName("selDestino")[0].value=1;
            break;
        case ("Amaga"):
            document.getElementsByName("selDestino")[0].value=2;
            break;
        case ("Jardín"):
            document.getElementsByName("selDestino")[0].value=3;
            break;
        case ("Santa Fe de Antioquia"):
            document.getElementsByName("selDestino")[0].value=4;
            break;
        case ("San Jerónimo"):
            document.getElementsByName("selDestino")[0].value=5;
            break;
    }
    
    document.getElementsByName("ipAlojamiento")[0].value=alojamiento;
    document.getElementsByName("ipCosto")[0].value=costo;
    document.getElementsByName("ttaDescripcion")[0].value=descripcion;
    document.getElementsByName("ipImagen")[0].value=imagen;

}

function seleccBorrar(id){
    console.log("|"+id +"|");
    url=window.location;
    url=url["href"]+"/"+id;
    advertencia="¿Esta seguro de borrar este registro con id: "+ id+"?";
    console.log("|"+advertencia +"|");
    document.getElementsByName("formBorrar")[0].action=url;
    document.getElementsByName("lblAdvertencia")[0].textContent=advertencia;
    
}
//Alojamientos

//recorridos
function seleccProduct2(id,ubicacion,titulo,costo,descripcion,imagen,fcreado,fupdate){
    console.log("|"+id +"|"+ubicacion+"|"+titulo+"|"+costo+"|"+descripcion+"|"+imagen);//imprimiendo en consola

    // document.getElementsByName("modAlojamiento")[0].style.display="none";
    // document.getElementsByName("modAlojamiento")[0].textContent=
    document.getElementsByName("txtId")[0].textContent=id;
    document.getElementsByName("txtUbicacion")[0].textContent=ubicacion;
    document.getElementsByName("txtAlojamiento")[0].textContent=titulo;
    document.getElementsByName("txtCosto")[0].textContent=costo;
    document.getElementsByName("txtDescripcion")[0].textContent=descripcion;
    document.getElementsByName("txtImagen")[0].src=imagen;
    document.getElementsByName("txtFcreacion")[0].textContent=fcreado;
    document.getElementsByName("txtFupdate")[0].textContent=fupdate;
    
}


function editProdut2(id,ubicacion,costo,descripcion,imagen,fcreado,fupdate){
    console.log("|"+id +"|"+ubicacion+"|"+costo+"|"+descripcion+"|"+imagen+"|"+fcreado+"|"+fupdate);
    document.getElementsByName("modAlojamientotxt")[0].style.display="none";
    url=window.location;
    url=url["href"]+"/"+id;
    document.getElementsByName("formActualizar")[0].action=url;
    document.getElementsByName("h5id")[0].textContent=id;
    document.getElementsByName("ipUbicacion")[0].value=ubicacion;
    document.getElementsByName("ipAlojamiento")[0].value="";
    document.getElementsByName("ipCosto")[0].value=costo;
    document.getElementsByName("ttaDescripcion")[0].value=descripcion;
    document.getElementsByName("ipImagen")[0].value=imagen;

}
