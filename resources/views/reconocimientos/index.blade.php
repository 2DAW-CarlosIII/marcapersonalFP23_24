@extends('layouts.master')

@section('content')

<div class="row">

    @foreach ( $reconocimientos as $reconocimiento)

    <div class = "col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured" title="Sakatsp, CC BY-SA 4.0 &lt;https://creativecommons.org/licenses/by-sa/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Award icon" src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png"></a>
            <header>
                <h3>Estudiante: </h3>
                <p style="font-size: 1.3em">{{ $reconocimiento->estudiante_nombre}} {{ $reconocimiento->estudiante_apellidos}}</p>
                <h3>Actividad: </h3>
                <p style="font-size: 1.3em">{{ $reconocimiento->actividad_nombre}}</p>
            </header>
            <p>

                {{-- <a href="{{ $reconocimiento->documento }}">
                    {{ $reconocimiento->documento }}
                </a> --}}
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
