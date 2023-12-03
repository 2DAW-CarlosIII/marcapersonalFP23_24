@extends('layouts.master')

@section('content')

<div class="row">

    @foreach ($estudiantes as $estudiante)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <img src="/images/mp-logo.png" style="height:200px"/>
            <header>
                <h3>{{ $estudiante->nombre }} {{ $estudiante->apellidos }}</h3>
            </header>
            <p>{{ $estudiante->ciclo }}</p>
            <footer>
                <ul class="actions text-center">
                    <li><a href="{{ action([App\Http\Controllers\EstudianteController::class, 'getShow'], ['id' => $estudiante->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endforeach

</div>
@endsection
