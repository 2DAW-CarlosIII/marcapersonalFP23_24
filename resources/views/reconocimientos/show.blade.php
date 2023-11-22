@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Estudiante: </strong>{{ $arrayReconocimientos['estudiante_id'] }}</h3>
            <h4><strong>Documento: </strong>
                <a href="{{ $arrayReconocimientos['documento'] }}">
                    {{ $arrayReconocimientos['documento'] }}
                </a>
            </h4>
            <h4><strong>Docente: </strong>{{ $arrayReconocimientos['docente_validador'] }}</h4>
            <p><strong>Fecha: </strong>
                {{ $arrayReconocimientos['fecha'] }}
            </p>
            <p><strong>Actividad: </strong>
                {{ $arrayReconocimientos['actividad_id'] }}
            </p>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar reconocimieto
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection
