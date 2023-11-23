@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <a href="#" class="image featured" title="Sakatsp, CC BY-SA 4.0 &lt;https://creativecommons.org/licenses/by-sa/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Award icon" src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png"></a>
        </div>
        <div class="col-sm-8">

            <h3><strong>Nombre: </strong>{{$arrayReconocimientos['estudiante_id'] }}</h3>
            <h4><strong>Documento: </strong>
                <a href={{ $arrayReconocimientos['documento'] }}>
                    {{ $arrayReconocimientos['documento'] }}
                </a>
            </h4>
            <h4><strong>Docente: </strong>{{ $arrayReconocimientos['docente_validador'] }}</h4>
            <h4><strong>Fecha: </strong>{{ $arrayReconocimientos['fecha'] }}</h4>
            <h4><strong>Actividad: </strong>{{ $arrayReconocimientos['actividad_id'] }}</h4>


            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\CatalogController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar reconocimientos
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\CatalogController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection
