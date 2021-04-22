function enlace() {
    // Buscamos el select y el valor del mismo
    var valor = document.getElementsByName('transportes')[0].value;
    if (valor != "") { location.href = valor; }
    console.log("|"+valor+"|");//imprimiendo en consola
  }