@extends('layouts.master')

@section('content')

<div class="row">

    @foreach ( $arrayReconocimientos as $reconocimiento)

    <div class = "col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured" title="Sakatsp, CC BY-SA 4.0 &lt;https://creativecommons.org/licenses/by-sa/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Award icon" src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png"></a>
            <header>
                <h3>{{ $reconocimiento->nombre }}</h3>
                <h4>{{ $reconocimiento->apellidos }}</h4>
            </header>
            <p>
                Participa en las siguientes actividades:<br>
                {{ $reconocimiento->nombre_actividad }}

            </p>
            <p>
                <a href="{{ $reconocimiento->documento }}">
                    {{ $reconocimiento->documento }}
                </a>
            </p>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getShow'], ['id' => $reconocimiento->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endforeach

</div>
@endsection
