@extends('layouts.master')

@section('content')

<div class="row">

    <div class="row">

        @for ($i=0; $i<count($arrayProyectos); $i++)

        <div class="col-4 col-6-medium col-12-small">
            <section class="box">
                <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
                <header>
                    <h3>{{ $arrayProyectos[$i]['nombre'] }}</h3>
                </header>
                <p>
                    <a href="http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]['dominio'] }}">
                        http://github.com/2DAW-CarlosIII/{{ $arrayProyectos[$i]['dominio'] }}
                    </a>
                </p>
                <footer>
                    <ul class="actions">
                        <li><a href="action([App\Http\Controllers\CatalogController::class, 'getShow'], ['id' => $i] )" class="button alt">Más info</a></li>
                    </ul>
                </footer>
            </section>
        </div>

        @endfor

    </div>

    @foreach( $arrayProyectos as $key => $proyecto )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">

        <a href="/">
            <img src="/images/mp-logo.png" style="height:200px"/>
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{ $proyecto['nombre'] }}
            </h4>
        </a>

    </div>
    @endforeach

</div>
@endsection
