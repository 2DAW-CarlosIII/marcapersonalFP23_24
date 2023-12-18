@extends('layouts.master')

@section('content')

<div class="row">

    @foreach ( $arrayActividades as $actividad)

    <div class="col-4 col-6-medium col-12-small">

        <section class="box text-center">
            <header>
                <i style="font-size: 6.5rem;" class='{{ $actividad->insignia }} text-danger'></i>
                <h3>Actividad {{ $actividad->docente_id }}</h3>
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
