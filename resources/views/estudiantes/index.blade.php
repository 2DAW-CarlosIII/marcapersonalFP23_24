@extends('layouts.master')
@section('content')
<div class="row">
    @for ($i=0; $i<count($arrayEstudiantes); $i++)
    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
            <header>

                <h3>{{ $arrayEstudiantes[$i]->nombre}}</h3>
            </header>
            <p>
                {{ $arrayEstudiantes[$i]->apellidos}};
            </p>
            <p>
                {{ $arrayEstudiantes[$i]->direccion}};
            </p>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\EstudianteController::class, 'getShow'], ['id' => $arrayEstudiantes[$i]->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>
    @endfor
</div>
@endsection
