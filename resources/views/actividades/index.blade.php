@extends('layouts.master')

@section('content')

<div class="row">

    @foreach ( $arrayActividades as $actividad)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">

            <a href="#" class="image featured" title="{{ $actividad->insignia }}">
                <i class='{{ $actividad->insignia }}'></i>
            </a>
            <header>
                <h3>Docente {{ $actividad->docente_id }}</h3>
            </header>
            <p>
                <a href="{{ $actividad->insignia }}">
                  {{ $actividad->insignia }}
                </a>
            </p>
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
