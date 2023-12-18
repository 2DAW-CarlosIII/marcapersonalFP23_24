@extends('layouts.master')

@section('content')

<div class="row">

    @foreach ( $arrayActividades as $actividad)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured text-center" title="SleaY, CC BY 4.0 &lt;https://creativecommons.org/licenses/by/4.0&gt;, via Wikimedia Commons">
                <i style="font-size: 10rem;"  class="{{ $actividad->insignia }}"></i>
            </a>
            <header>
                <h3>Actividad {{ $actividad->id }}</h3>
            </header>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\ActividadController::class, 'getShow'], ['id' => $actividad->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>
    @endforeach
</div>
@endsection
