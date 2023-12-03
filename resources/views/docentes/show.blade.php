@extends('layouts.master')
@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Nombre: </strong>{{ $docente->nombre}}</h3>
            <h4><strong>Apellidos: </strong>{{$docente->apellidos}}</h4>
            <h4><strong>Dirección: </strong>{{$docente->direccion}}</h4>
            <h4><strong>Departamento: </strong>{{$docente->departamento}}</h4>
            <p><strong>Estado: </strong>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\DocenteController::class, 'putEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar docente
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\CatalogController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection
