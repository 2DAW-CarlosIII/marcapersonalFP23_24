@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:200px"/>

        </div>
        <div class="col-sm-8 align-self-center">

            <h3><strong>Nombre: </strong>{{ $docente->nombre }}</h3>
            <h4><strong>Apellidos: </strong>{{ $docente->apellidos }}</h4>
            <h4><strong>Direccion: </strong>{{ $docente->direccion }}</h4>
            <h4><strong>Departamento: </strong>{{ $docente->departamento }}</h4>

            <br>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\DocenteController::class, 'getEdit'], ['id' => $docente->id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar docente
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\DocenteController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection
