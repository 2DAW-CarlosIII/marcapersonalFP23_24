@extends('layouts.master')

@section('content')
    <div class="row m-4">

        <div class="col-sm-4">

            <a href="#" class="image featured" title="Nice and Serious, CC0, via Wikimedia Commons"><img width="256"
                    alt="User (89041) - The Noun Project"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/User_%2889041%29_-_The_Noun_Project.svg/256px-User_%2889041%29_-_The_Noun_Project.svg.png">
                @if ($user['avatar'])
                    <img src="{{ Storage::url($user['avatar']) }}" alt="Avatar" class="img-thumbnail">
                @else
                    <img width="300" style="height:300px" alt="Curriculum-vitae-warning-icon"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png">
                @endif
            </a>

        </div>
        <div class="col-sm-8 align-self-center">

            <h3><strong>Nombre: </strong>{{ $user['first_name'] }}</h3>
            <h3><strong>Apellido: </strong>{{ $user['last_name'] }}</h3>
            <br />
            <h4><strong>Email: </strong>
                <a href="{{ $user['email'] }}">{{ $user['email'] }}</a>
            </h4>
            <h4><strong>Linkedin: </strong>
                <a href="{{ $user['linkedin'] }}">{{ $user['linkedin'] }}</a>
            </h4>
            <br />
            <a class="btn btn-warning"
                href="{{ action([App\Http\Controllers\UserController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar Users
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\UserController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>
@endsection
