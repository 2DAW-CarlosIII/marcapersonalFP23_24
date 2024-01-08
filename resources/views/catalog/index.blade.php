@extends('layouts.master')

@section('content')

<div class="row">

    @for ($i=0; $i<count($arrayProyectos); $i++)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="{{ action([App\Http\Controllers\CatalogController::class, 'getShow'], ['id' => $arrayProyectos[$i]['id']] ) }}" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
            <header>
                <h3>{{ $arrayProyectos[$i]['nombre'] }}</h3>
            </header>
            <p>
                <a href="http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]['dominio'] }}">
                    http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]['dominio'] }}
                </a>
            </p>
            <p>
                <h4>
                    @if ($arrayProyectos[$i]['fichero'])
                        <a href="{{ Storage::url($arrayProyectos[$i]['fichero']) }}" download="proyecto.rar">Fichero Comprimido</a>
                    @else
                        No se ha subido el proyecto aún.
                    @endif
                </h4>
            </p>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\CatalogController::class, 'getShow'], ['id' => $arrayProyectos[$i]['id']] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endfor

</div>
@endsection
