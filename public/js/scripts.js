function enlace() {
    // Buscamos el select y el valor del mismo
    var valor = document.getElementsByName('transportes')[0].value;
    if (valor != "") { location.href = valor; }
    console.log("|"+valor+"|");//imprimiendo en consola
  }

function plan(id){
  var frm = document.getElementById('formPlan'+id);
  frm.submit();
}


// function fechaSeleccionada(){
//   var fecha = picker.toString('YYYY-MM-DD');
//   console.log(fecha)
// }

function javascript_to_php(pagina) {
  var fecha = picker.toString('YYYY-MM-DD');
  console.log(pagina);
  // window.location.href = window.location.href + "w1=" + jsVar1 + "&w2=" + jsVar2;
  window.location.href = pagina + "?fecha="+fecha;
}