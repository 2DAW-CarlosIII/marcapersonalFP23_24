@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <a href="#" class="image featured text-center" title="SleaY, CC BY 4.0 &lt;https://creativecommons.org/licenses/by/4.0&gt;, via Wikimedia Commons">
                <i style="font-size: 10rem;"  class="{{ $actividad->insignia }}"></i>
            </a>

        </div>
        <div class="col-sm-8 align-self-center">
            <h3><strong>Actividad: </strong>{{ $actividad->id }}</h3></br>
            <h4><strong>Docente: </strong>{{ $docente->nombre }} {{ $docente->apellidos }}</h4></br>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\ActividadController::class, 'getEdit'], ['id' => $actividad->id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar Actividad
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\ActividadController::class, 'getIndex']) }}">
                Volver a actividades
            </a>


        </div>
    </div>

@endsection
