@extends('layouts.master')

@section('content')

    <div class="row">

        @for ($i=0; $i<count($arrayReconocimientos); $i++)

        <div class=col-4 col-6-medium col-12-small">
            <section class="box">
                <a href="#" class="image featured" title="Sakatsp, CC BY-SA 4.0 &lt;https://creativecommons.org/licenses/by-sa/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Award icon" src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png"></a>
                <header>
                    <h3>Estudiante {{ $arrayReconocimientos[$i]['estudiante_id'] }}</h3>
                </header>
                <p>
                    <a href="http://github.com/2DAW-CarlosIII/{{ $arrayReconocimientos[$i]['estudiante_id'] }}">
                        http://github.com/2DAW-CarlosIII/{{ $arrayReconocimientos[$i]['estudiante_id'] }}
                    </a><br>
                    <a href="http://github.com/2DAW-CarlosIII/{{ $arrayReconocimientos[$i]['actividad_id'] }}">
                        http://github.com/2DAW-CarlosIII/{{ $arrayReconocimientos[$i]['actividad_id'] }}
                    </a><br>
                    <a href=""{{ $arrayReconocimientos[$i]['documento'] }}">
                        {{ $arrayReconocimientos[$i]['documento'] }}
                    </a><br>
                    <a href="http://github.com/2DAW-CarlosIII/{{ $arrayReconocimientos[$i]['fecha'] }}">
                        http://github.com/2DAW-CarlosIII/{{ $arrayReconocimientos[$i]['fecha'] }}
                    </a><br>
                    <a href="http://github.com/2DAW-CarlosIII/{{ $arrayReconocimientos[$i]['docente_validador'] }}">
                        http://github.com/2DAW-CarlosIII/{{ $arrayReconocimientos[$i]['docente_validador'] }}
                    </a>
                </p>
                <footer>
                    <ul class="actions">
                        <li><a href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getShow'], ['id' => $i] ) }}" class="button alt">Más info</a></li>
                    </ul>
                </footer>
            </section>
        </div>

        @endfor

    </div>
@endsection
