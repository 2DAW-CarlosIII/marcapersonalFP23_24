@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img style="width:256px" alt="User (89041) - The Noun Project" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/User_%2889041%29_-_The_Noun_Project.svg/256px-User_%2889041%29_-_The_Noun_Project.svg.png">

        </div>
        <div class="col-sm-8">

            <h3><strong>Correo: </strong>{{ $user['email'] }}</h3>
            <h4><strong>Nombre: </strong>{{ $user['first_name'] }}</h4>
            <h4><strong>Apellido: </strong>{{ $user['last_name'] }}</h4>
            <h4><strong>Linkedin: </strong>
                <a href="{{ $user['linkedin'] }}">
                    {{ $user['linkedin'] }}
                </a>
            </h4>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\UserController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar usuario
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\UserController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection
