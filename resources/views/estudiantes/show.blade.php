@extends('layouts.master')

@section('content')

<div class="row m-4">
    <div class="col-sm-4">
        @if ($estudiante->avatar)
            <img src="{{ Storage::url($estudiante->avatar) }}" alt="Avatar" class="img-thumbnail">
        @else
                <img width="300" style="height:300px" alt="Curriculum-vitae-warning-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png">
        @endif
    </div>

    <div class="col-sm-8  align-self-center">
        <h3><strong>Nombre:</strong> {{ $estudiante->nombre }}</h3>
        <h3><strong>Apellidos:</strong> {{ $estudiante->apellidos}}</h3>
        </br>
        <h4><strong>Ciclo:</strong>{{ $estudiante->ciclo }}</h4>
        <h4><strong>Direccion:</strong>{{ $estudiante->direccion }}</h4>
        <h4><strong>Votos:</strong>{{ $estudiante->votos }}</h4>
        <h4><strong>Confirmado:</strong>
        @if($estudiante->confirmado == 1)
            Si
        @else
            No
        @endif</h4>
        </br>
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
