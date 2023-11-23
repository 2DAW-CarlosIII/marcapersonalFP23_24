@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <section class="box">
                <a href="#" class="image featured" title="Nice and Serious, CC0, via Wikimedia Commons">
                    <img width="256" alt="User (89041) - The Noun Project" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/User_%2889041%29_-_The_Noun_Project.svg/256px-User_%2889041%29_-_The_Noun_Project.svg.png"></a>
            </section>
        </div>
    </section>
</div>
<div class="col-8 col-8-medium col-8-small">
    <section class="box">
        <header>
            <h3 class='text-left' >{{ $user['first_name'] }} {{ $user['last_name'] }}</h3>
        </header>

        <p class="text-dark">linkedin:  {{ $user['linkedin']}}</p>

        <footer>
            <ul class="actions">
                <li><a href="{{ action([App\Http\Controllers\UserController::class, 'getEdit'], ['id' => $id]) }}"
                        class="button alt">Editar Usuario</a></li>
                <li>
                    <a href="{{ action([App\Http\Controllers\UserController::class, 'getIndex']) }}"
                        class="button alt">Listar Usuarios</a>
                </li>
            </ul>
        </footer>
    </section>
</div>
</div>

@endsection
