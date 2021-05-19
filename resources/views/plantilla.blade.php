<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes | Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link href="{{ asset('css/plantilla.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/alojamientos.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/inscripcion.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/recorridos.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/tours.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/contacto.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/registro.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/plan.css') }}" rel="stylesheet"/>
    <!-- <link href="{{ asset('css/admin.css') }}" rel="stylesheet"/> -->
    <link rel="shortcut icon" href="{{'img/faviconlaravel.png' }}" />
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
    


  </head>
<body>
<!-- <img id="fondo" src="{{ asset('img/inicio.jpg') }}" alt=""> -->
<div class="imagen-fondo">
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <!-- <img id="logo-img" src="{{ asset('img/logo.png') }}" alt=""> -->
      <a id="logo-text" class="navbar-brand col-2" href="#">Viajes.<span>loc</span></a>
      
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Alojamientos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/recorridos') }}">Recorridos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/tours') }}">Tours</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Codes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ url('/repitiendocode') }}">Forma1: Repitiendo Codigo (Alojamientos)</a></li>
            <li><a class="dropdown-item" href="{{ url('/usandoarray') }}">Forma2: Usando un Array (Recorridos)</a></li>
            <li><a class="dropdown-item" href="{{ url('/usandodb') }}">Forma3: Usando Base de datos (Tours)</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Otro</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/admin') }}">Iniciar como Admin</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <form class="d-flex">
        <input id="inEmail" class="form-control me-2" type="email" placeholder="Email">
        <br>
        <input id="inPassword" class="form-control me-2" type="password" placeholder="Password">
        <button class="btn btn btn-light" type="submit">Login</button>
      </form>
    </div>
  </div>
</nav>

<div class="menu">
  <!-- <br><br><br><br><br><br><br><br><br> -->
  <h1>¡Emprende tu aventura!</h1>
  <!-- <br> -->
  <!-- <br><br><br><br><br><br><br><br><br> -->
  </div>
</div>

<div class="fondomorado">
<div class="container">
<br>
<br>


@yield('content')

</div>       
</div>

<div class="wh30"></div>
<footer>
  <br>
  COPYRIGHT {{ date('Y')}}
  <br><br>
  
</footer>


</body>
</html>