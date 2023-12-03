@extends('layouts.master')
@section('content')
<div class="row">
    @foreach ($arrayEstudiantes as $estudiante)
    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
            <header>

                <h3>{{ $estudiante->nombre}}</h3>
            </header>
            <p>
                {{ $estudiante->apellidos}};
            </p>
            <p>
                {{ $estudiante->direccion}};
            </p>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\EstudianteController::class, 'getShow'], ['id' => $estudiante->id]) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>
    @endforeach
</div>
@endsection
