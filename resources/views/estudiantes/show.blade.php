@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <a href="#" class="image featured" title="Nice and Serious, CC0, via Wikimedia Commons"><img width="256" alt="User (89041) - The Noun Project"
               src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/User_%2889041%29_-_The_Noun_Project.svg/256px-User_%2889041%29_-_The_Noun_Project.svg.png">
            </a>

        </div>
        <div class="col-sm-8 align-self-center">

            <h3><strong>Nombre: </strong>{{ $estudiante->nombre }}</h3>
            <h3><strong>Apellidos: </strong>{{ $estudiante->apellidos }}</h3>
            <br/>
            <h4><strong>Ciclo: </strong> {{ $estudiante->ciclo }}</h4>
            <h4><strong>Votos: </strong> {{ $estudiante->votos }}</h4>
            <h4><strong>Dirección: </strong> {{ $estudiante->direccion }}</h4>
            <br/>
            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\EstudianteController::class, 'getEdit'], ['id' => $estudiante->id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar Estudiante
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\EstudianteController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection
