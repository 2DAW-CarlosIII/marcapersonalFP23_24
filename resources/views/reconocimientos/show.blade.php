@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <p><strong>ID EStudiante: </strong>{{ $reconocimiento['estudiante_id'] }}</p>
            <p><strong>ID Actividad </strong>{{ $reconocimiento['actividad_id'] }}</p>
            <p><strong>Documento: </strong>{{ $reconocimiento['documento'] }}</p>
            <p><strong>Fecha: </strong>{{ $reconocimiento['fecha'] }}</p>
            <p><strong>Docente Validador: </strong>{{ $reconocimiento['docente_validador'] }}</p>



            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getEdit'], ['id' => $idReconocimiento]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar reconocimiento
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getIndex']) }}">
                Volver al listado
            </a>



        </div>
    </div>

@endsection
