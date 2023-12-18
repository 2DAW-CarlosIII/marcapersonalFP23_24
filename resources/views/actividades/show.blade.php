@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <a href="#" class="image featured" title="SleaY, CC BY 4.0 &lt;https://creativecommons.org/licenses/by/4.0&gt;, via Wikimedia Commons">
                <i style="font-size: 10rem" class='{{ $actividad->insignia }}'></i>
            </a>

        </div>
        <div class="col-sm-8 align-self-center">
            <h3><strong>Docente: </strong>{{ $actividad->docente_id }}</h3></br>
            <h3><strong>Nombre</strong> {{$docente->nombre }}</h3>
            <h3><strong>Apellidos</strong> {{$docente->apellidos }}</h3>
            <h4><strong>Insignia: </strong> {{ $actividad->insignia }} </h4></br>
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
