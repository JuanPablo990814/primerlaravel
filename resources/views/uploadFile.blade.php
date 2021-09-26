@extends('plantilla2')

@section('content')

@if (session('msg'))
    <div class="alert {{ session('class') }}">
        {{ session('msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </div>
@endif

<!-- <form method="post" action="{{url('upload')}}" enctype="multipart/form-data"> -->
<form method="post" action="{{url('upload')}}" enctype="multipart/form-data">
@csrf
<div class="form-group">
    <label class="tituloblanco">Imagenes</label>
    <!-- <input class="form-control" id="files" name="files[]" type="file" multiple accept="image/png, image/jpeg"> -->
    <input class="form-control" id="files" name="files" type="file" accept="image/png, image/jpeg">
    @error('files')
    <br>
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<br>
<button type="submit" class="btn btn-primary">Submit</button>
<br>
</form>
@endsection