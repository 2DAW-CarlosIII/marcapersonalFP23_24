@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Nombre: </strong>{{ $arrayUsers['first_name'] }}</h3>
            <h3><strong>Apellido: </strong>{{ $arrayUsers['last_name'] }}</h3>
            <h3><strong>Email: </strong>{{ $arrayUsers['email'] }}</h3>
            <h4><strong>Dominio: </strong>
                <a href="http://github.com/2DAW-CarlosIII/{{ $arrayUsers['linkedin'] }}">
                    http://github.com/2DAW-CarlosIII/{{ $arrayUsers['linkedin'] }}
                </a>
            </h4>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\UserController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar usuario
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\UserController::class, 'getIndex']) }}">
                Volver al listado de usuario
            </a>


        </div>
    </div>

@endsection

