@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

<<<<<<< HEAD
            <a href="#" class="image featured" title="Nice and Serious, CC0, via Wikimedia Commons"><img width="256" alt="User (89041) - The Noun Project"
               src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/User_%2889041%29_-_The_Noun_Project.svg/256px-User_%2889041%29_-_The_Noun_Project.svg.png">
            </a>

        </div>
        <div class="col-sm-8 align-self-center">

            <h3><strong>Nombre: </strong>{{ $user['first_name'] }}</h3>
            <h3><strong>Apellido: </strong>{{ $user['last_name'] }}</h3>
            <br/>
            <h4><strong>Email: </strong>
                <a href="{{ $user['email'] }}">{{ $user['email'] }}</a>
            </h4>
            <h4><strong>Linkedin: </strong>
                <a href="{{ $user['linkedin'] }}">{{ $user['linkedin'] }}</a>
            </h4>
            <br/>
            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\UserController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar Users
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\UserController::class, 'getIndex']) }}">
                Volver al listado
=======
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
>>>>>>> 824fc149a9afd56b31838ad4421e0337c2c1abdd
            </a>


        </div>
    </div>

@endsection
<<<<<<< HEAD
=======

>>>>>>> 824fc149a9afd56b31838ad4421e0337c2c1abdd
