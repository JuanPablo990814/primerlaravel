<?php
$msg='';
if(session('msg'))
    $msg='<h4 class="titulolog">'.session('msg').'</h4>';
?>

@extends('plantilla2')
@section('content')


    <form method="post" action="{{ url('login') }}">
        @csrf
        <div class="mb-3 row">
            <h2 class="titulolog">Login - Clase<h2>
            {!! $msg !!}
        </div>
        <div class="mb-3 row">
        
            <label for="inpEmail" class="col-sm-2 col-form-label" id="lblUsuario">Email</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="email" id="email" value="" placeholder="Email">
                <small id="emailHelp" class="form-text text-muted">{{$errors->first('email')}}</small>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="InpPassword" class="col-sm-2 col-form-label" id="lblContraseña">Contraseña</label>
            <div class="col-sm-6">
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
            <small id="passwordHelp" class="form-text text-muted">{{$errors->first('password')}}</small>
            </div>
        </div>
        <div class="mb-6 row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-6">
                <button type="submit"  class="btn btn-dark" data-bs-toggle="" data-bs-target="" onclick="">Ingresar</button>
            </div>
        </div>
    </form>

@endsection