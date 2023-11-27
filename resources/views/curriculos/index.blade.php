@extends('layouts.master')

@section('content')
    <div class="row">

        <ul class="actions">
            <li>
                <a class="nav-link" href="{{url('/curriculos/create')}}">
                    <span>&#10010</span> Nuevo curriculum
                </a>
            </li>
        </ul>

        @for ($i = 0; $i < count($arrayCurriculos); $i++)
            <div class="col-4 col-6-medium col-12-small">
                <section class="box">
                    <a href="#"
                        title="SleaY, CC BY 4.0 &lt;https://creativecommons.org/licenses/by/4.0&gt;, via Wikimedia Commons"><img
                            width="256" alt="Curriculum-vitae-warning-icon"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png"></a>
                    <header>
                        <h3>Usuario {{ $arrayCurriculos[$i]['user_id'] }}</h3>
                    </header>
                    <p>
                        <a href="{{ $arrayCurriculos[$i]['video_curriculum'] }}">
                            {{ $arrayCurriculos[$i]['texto_curriculum'] }}
                        </a>
                    </p>
                    <footer>
                        <ul class="actions">
                            <li><a href="{{ action([App\Http\Controllers\CurriculoController::class, 'getShow'], ['id' => $i]) }}"
                                    class="button alt">Más info</a></li>
                        </ul>
                    </footer>
                </section>
            </div>
        @endfor

    </div>
@endsection
