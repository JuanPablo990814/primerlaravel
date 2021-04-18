@extends('plantilla')

@section('content')

<h2 id="txtalojamiento">Recorridos</h2>
<br>
        <div class="row">
            <div class="col">
                <ul class="planes">
                    @foreach($array["planes"] AS $p)
                    <li>
                        <div class="foto">
                            <a>
                                <img src="{{ $p[4] }}" alt="{{ $p[0] }}" title="{{ $p[0] }}"/>
                            </a>
                            <span>{{ $p[3] }} por persona</span>
                        </div>
                        <div class="descripcion">
                            <h5>{{ $p[0] }}</h5>
                            <a>
                                <h2>{{ $p[1] }}</h2>
                            </a>
                            <p>{{ $p[2] }}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

@endsection