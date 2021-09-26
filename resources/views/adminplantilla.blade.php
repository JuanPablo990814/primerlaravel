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
  
  </head>
<body>
<!-- <img id="fondo" src="{{ asset('img/inicio.jpg') }}" alt=""> -->
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <!-- <img id="logo-img" src="{{ asset('img/logo.png') }}" alt=""> -->
      <a id="logo-text" class="navbar-brand col-2" href="{{ url('/') }}">Viajes.<span>loc</span></a>
      
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
          Code
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ url('/repitiendocode') }}">Forma1: Repitiendo Codigo (Alojamientos)</a></li>
            <li><a class="dropdown-item" href="{{ url('/usandoarray') }}">Forma2: Usando un Array (Recorridos)</a></li>
            <li><a class="dropdown-item" href="{{ url('/usandodb') }}">Forma3: Usando Base de datos (Tours)</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ url('/upload') }}">Subir Archivos</a></li>
            <li><a class="dropdown-item" href="{{ url('/sesion') }}">Sesiones</a></li>
            <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li><a class="dropdown-item" href="{{ url('/horatest') }}">Hora Test</a></li>
            <li><a class="dropdown-item" href="{{ url('/conexionprueba') }}">Test SQL Server ¡Codigo Comentado!</a></li>
            <li><a class="dropdown-item" href="{{ url('/alfanumerico/12juan') }}">Filtros Url: prueba con el 12juan</a></li>
            <li><a class="dropdown-item" href="{{ url('/numerico/12') }}">Filtros Url: prueba con el 12</a></li>
            <li><a class="dropdown-item" href="{{ url('/ejercicios') }}">Ejercicios de Aprendizaje Iniciales</a></li>
            <li><a class="dropdown-item" href="{{ url('/rutaImg') }}">Ruta del archivo .env</a></li>
            <li><a class="dropdown-item" href="{{ url('/uploadJson') }}">Cargar Archivo en Json</a></li>
            <li><a class="dropdown-item" href="{{ url('/jsonImg') }}">Imagenes extraidas del json</a></li>
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
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn btn-light" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<div class="row">
  <div class="col-2">
    <div class="herramientas">
    <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Planes
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <a class="nav-link" href="{{ url('/admin') }}">Alojamientos</a>
        <a class="nav-link" href="{{ url('/adminRecorridos') }}">Recorridos</a>
        <a class="nav-link" href="{{ url('/adminTours') }}">Tours</a>    
      </div>
    </div>
    </div>

    <a class="nav-link herramientas2" href="{{ url('/pedidos') }}">Pedidos</a>   

    </div>

  </div>
  <div class="col-10">
    @yield('content')
  </div>
</div>


<footer>
  <br>
  COPYRIGHT {{ date('Y')}}
  <br><br>
  
</footer>

<script src="{{ asset('js/adminInteractividad.js') }}"></script>
</body>
</html>