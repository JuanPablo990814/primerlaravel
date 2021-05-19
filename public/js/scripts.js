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

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()