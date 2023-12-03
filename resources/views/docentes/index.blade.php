@extends('layouts.master')

@section('content')

<div class="row">

    @for ($i=0; $i<count($docente); $i++)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
            <header>
                <h3>{{ $docente[$i]->nombre }}</h3>
            </header>
            <h4>
                {{ $docente[$i]->departamento }}
            </h4>
            <footer>
                <ul class="actions">
                    //TODO enlazar el show de catalogController
                    <li><a href="{{ action([App\Http\Controllers\DocenteController::class, 'getShow'], ['id' => $docente[$i]->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endfor

</div>
@endsection
