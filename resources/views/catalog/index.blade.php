@extends('layouts.master')

@section('content')

<div class="row">

    {{-- @for ($i=0; $i<count($arrayProyectos); $i++) --}}
    @foreach ($proyecto as $proyecto)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
            <header>
                <h3>{{ $proyecto->nombre}}</h3>
            </header>
            <p>
                <a href="http://github.com/2DAW-CarlosIII/{{ $proyecto->dominio}}">
                    http://github.com/2DAW-CarlosIII/{{ $proyecto->dominio}}
                </a>
            </p>
            <footer>
                <ul class="actions">
                    //TODO enlazar el show de catalogController
                    <li><a href="{{ action([App\Http\Controllers\CatalogController::class, 'getShow'], ['id' => $proyecto->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endforeach

</div>
@endsection
