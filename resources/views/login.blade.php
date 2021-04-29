<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet"/>
    <script type="text/javascript" src="{{ asset('js/adminscripts.js') }}"></script>
    <link rel="shortcut icon" href="{{'img/faviconlaravel.png' }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
  </head>
<body>
<!-- <img id="fondo" src="{{ asset('img/inicio.jpg') }}" alt=""> -->
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
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/contacto') }}">Contacto</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Code
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ url('/repitiendocode') }}">Forma1: Repitiendo Codigo (Alojamientos)</a></li>
            <li><a class="dropdown-item" href="{{ url('/usandoarray') }}">Forma2: Usando un Array (Recorridos)</a></li>
            <li><a class="dropdown-item" href="{{ url('/usandodb') }}">Forma3: Usando Base de datos (Tours)</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Otro</a></li>
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn btn-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<br><br>
<div class="container">
    <form method="">
    <div class="mb-3 row">
        <label for="txtUser" class="col-sm-2 col-form-label" id="lblUsuario">Usuario</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="txtUser" value="">
        </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label" id="lblContraseña">Contraseña</label>
    <div class="col-sm-6">
      <input type="password" class="form-control" id="inputPassword">
    </div>
  </div>
  <div class="mb-6 row">
    <div class="col-sm-4">

    </div>
    <div class="col-sm-6">
        <a href="" class="btn btn-dark" data-bs-toggle="" data-bs-target="" onclick="">Ingresar</a>
    </div>
  </div>
    </form>
</div>




<footer>
  <br>
  COPYRIGHT {{ date('Y')}}
  <br><br>
  
</footer>


</body>
</html>

