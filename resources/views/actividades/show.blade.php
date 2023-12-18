@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4 text-center text-danger">

         <i style="font-size: 10rem" class='{{ $actividad->insignia }}'></i>
        </div>
        <div class="col-sm-8 align-self-center">
            <h3><strong>Actividad: </strong>{{ $actividad->id }}</h3></br>
            <h3><strong>Docente: </strong></h3>
            <h3>{{$docente->nombre }} {{$docente->apellidos }}</h3>
            <h3> </h3>
            </br>
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
