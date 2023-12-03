@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <a href="#" class="image featured" title="User Tie, via svgrepo">
                <img alt="User tie"
               src="https://www.svgrepo.com/show/352649/user-tie.svg">
            </a>

        </div>
        <div class="col-sm-8 align-self-center">

            <h3><strong>Nombre: </strong>{{ $docente->nombre }}</h3>
            <h3><strong>Apellidos: </strong>{{ $docente->apellidos }}</h3>
            <br/>
            <h4><strong>Dirección: </strong>
                {{ $docente->direccion }}
            </h4>
            <h4><strong>Departamento: </strong>
                {{ $docente->departamento }}
            </h4>
            <br/>
            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\DocenteController::class, 'getEdit'], $docente->id) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar Docentes
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\DocenteController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection
