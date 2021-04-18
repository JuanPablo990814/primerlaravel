@extends('plantilla')

@section('content')

<h2 id="txtalojamiento">Tours</h2>
<br>
        <div class="row">
            <div class="col">
                <ul class="planes">
                @foreach($query AS $c)
                    <li>
                        <div class="foto">
                            <a>
                                <img src="{{ $c -> foto }}" alt="{{ $c -> ubicacion }}" title="{{ $c -> ubicacion }}"/>
                            </a>
                            <span>{{ $c -> costo_persona }} por persona</span>
                        </div>
                        <div class="descripcion">
                            <h5>{{ $c -> ubicacion }}</h5>
                            <a>
                                <h2>{{ $c -> alojamiento }}</h2>
                            </a>
                            <p>{{ $c -> descripcion }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    


@endsection