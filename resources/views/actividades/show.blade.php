@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Docente: </strong>{{ $actividad['docente_id'] }}</h3>
            <h3><strong>Insignia: </strong>{{ $actividad['insignia'] }}</h3>



            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\ActividadController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar actividad
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\ActividadController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection
