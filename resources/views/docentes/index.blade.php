@extends('layouts.master')
@section('content')
<div class="row">
    @for ($i=0; $i<count($arrayDocentes); $i++)
    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
            <header>

                <h3>{{ $arrayDocentes[$i]->nombre}}</h3>
            </header>
            <p>
                {{ $arrayDocentes[$i]->apellidos}};
            </p>
            <p>
                {{ $arrayDocentes[$i]->direccion}};
            </p>
            <p>
                {{ $arrayDocentes[$i]->departamento}};
            </p>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\DocentesController::class, 'getShow'], ['id' => $arrayDocentes[$i]->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>
    @endfor
</div>
@endsection
