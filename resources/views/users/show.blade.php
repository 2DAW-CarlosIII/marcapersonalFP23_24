@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/User_%2889041%29_-_The_Noun_Project.svg/256px-User_%2889041%29_-_The_Noun_Project.svg.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Nombre: </strong>{{ $arrayUsers['first_name'] }}</h3>
            <h3><strong>Apellido: </strong>{{ $arrayUsers['last_name'] }}</h3>
            <h3><strong>Email: </strong>{{ $arrayUsers['email'] }}</h3>
            <h3><strong>Perfil Linkedin: </strong> <a href="{{ $arrayUsers['linkedin'] }}"> {{ $arrayUsers['linkedin'] }} </a></h3>

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

