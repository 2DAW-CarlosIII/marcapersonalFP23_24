@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <a href="#" class="image featured"><img src="{{ asset('/images/mp-logo.png') }}" alt="" /></a>
        </div>
        <div class="col-sm-8">
            <h4><strong>Docente: </strong>{{ $actividad['docente_id'] }}</h4>
            <h4><strong>Insignia: </strong>{{ $actividad['insignia'] }} </h4>
            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\ActividadController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar actividad
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\ActividadController::class, 'getIndex']) }}">
                Volver a actividades
            </a>


        </div>
    </div>

@endsection