@extends('layouts.master')
@section('content')
    <div class="row m-4">
        <div class="col-sm-4">
            <img src="/images/mp-logo.png" style="height:200px"/>
        </div>
        <div class="col-sm-8">
            <h3><strong>Nombre: </strong>{{ $docentes->nombre }}</h3>
            <h3><strong>Apellidos: </strong>{{ $docentes->apellidos }}</h3>
            <h4><strong>Direccion: </strong>{{ $docentes->direccion }}</h4>
            <h4><strong>Departamento: </strong>{{ $docentes->votos }}</h4>


            <p><strong>Confirmado: </strong>

                @if($docentes->confirmado === true)
                    Docente confirmado
                @else
                    Docente no confirmado
                @endif
            </p>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\DocentesController::class, 'getEdit'], ['id' => $docentes->id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar docente
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\DocentesController::class, 'getIndex']) }}">
                Volver al listado
            </a>
        </div>
    </div>
@endsection
