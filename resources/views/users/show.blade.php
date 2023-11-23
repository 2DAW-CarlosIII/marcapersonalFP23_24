@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-4 col-4-medium col-4-small">
            <section class="box">
                <a href="#" class="image featured" title="Nice and Serious, CC0, via Wikimedia Commons"><img
                        width="256" alt="User (89041) - The Noun Project"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/User_%2889041%29_-_The_Noun_Project.svg/256px-User_%2889041%29_-_The_Noun_Project.svg.png"></a>

            </section>
        </div>
        <div class="col-8 col-8-medium col-8-small">
            <section class="box">
                <header>
                    <h3 class='text-center' >{{ $user['first_name'] }} {{ $user['last_name'] }}</h3>
                </header>


                <p class="text-dark"><i class="bi bi-envelope-at-fill"></i> {{ $user['email'] }} </p>
                <p class="text-dark"><i class="bi bi-linkedin"></i>  {{ $user['linkedin']}}</p>

                <footer>
                    <ul class="actions">
                        <li><a href="{{ action([App\Http\Controllers\UserController::class, 'getEdit'], ['id' => $id]) }}"
                                class="button alt  bg-danger">Editar Usuario</a></li>
                        <li>
                            <a href="{{ action([App\Http\Controllers\UserController::class, 'getIndex']) }}"
                                class="button alt">Listar Usuarios Usuario</a>
                        </li>
                    </ul>
                </footer>
            </section>
        </div>



    </div>
@endsection
