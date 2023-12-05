@extends('layouts.master')

@section('content')

<div class="row">

    @foreach ($docentees as $docente)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
            <header>
                <h3>{{ $docente->nombre }}</h3>
            </header>
            <h4>
                {{ $docente->departamento }}
            </h4>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\DocenteController::class, 'getShow'], ['id' => $docente->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endforeach

</div>
@endsection
