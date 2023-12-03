@extends('layouts.master')

@section('content')

<div class="row">

    @foreach($arrayProyectos as $proyecto)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
            <header>
<<<<<<< HEAD
                <h3>{{ $proyecto->nombre }}</h3>
            </header>
            <p>
                <a href="http://github.com/2DAW-CarlosIII/{{ $proyecto->dominio }}">
                    http://github.com/2DAW-CarlosIII/{{ $proyecto->dominio }}
=======
                <h3>{{ $arrayProyectos[$i]->nombre }}</h3>
            </header>
            <p>
                <a href="http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]->dominio }}">
                    http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]->dominio }}
>>>>>>> issueDocentes
                </a>
            </p>
            <footer>
                <ul class="actions">
                    //TODO enlazar el show de catalogController
<<<<<<< HEAD
                    <li><a href="{{ action([App\Http\Controllers\CatalogController::class, 'getShow'], ['id' => $proyecto->id] ) }}" class="button alt">Más info</a></li>
=======
                    <li><a href="{{ action([App\Http\Controllers\CatalogController::class, 'getShow'], ['id' => $arrayProyectos[$i]->id] ) }}" class="button alt">Más info</a></li>
>>>>>>> issueDocentes
                </ul>
            </footer>
        </section>
    </div>

    @endforeach

</div>
@endsection
