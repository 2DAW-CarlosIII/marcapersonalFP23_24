@extends('layouts.master')

@section('content')

<div class="row">

    @for ($i=0; $i<count($arrayReconocimientos); $i++)

    <div class= "col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured" title="Sakatsp, CC BY-SA 4.0 &lt;https://creativecommons.org/licenses/by-sa/4.0&gt;, via Wikimedia Commons"><img alt="Award icon" src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png" style="width:256px"></a>
            <header>
                <h3>Estudiante {{ $arrayReconocimientos[$i]['estudiante_id'] }}</h3>
            </header>
            <p>
                <a href="{{ $arrayReconocimientos[$i]['documento'] }}">
                    {{ $arrayReconocimientos[$i]['documento'] }}
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
