@extends('layouts.master')

@section('content')

<div class="row">

    @for ($i=0; $i<count($arrayUsers); $i++)

    <div class="col-4 col-6-medium col-12-small">

        <section class="box">
            <a href="#" class="image featured" title="Nice and Serious, CC0, via Wikimedia Commons">
                <img width="256" alt="User (89041) - The Noun Project" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/User_%2889041%29_-_The_Noun_Project.svg/256px-User_%2889041%29_-_The_Noun_Project.svg.png"></a>

            <header>
                <h3>{{ $arrayUsers[$i]['first_name'] }} {{ $arrayUsers[$i]['last_name'] }}</h3>
            </header>
            <p class="text-dark">
                Linkedin:{{$arrayUsers[$i]['linkedin']}}</p>
            <!--
                El siguiente código debe ser adaptado.
                Una vez adaptado, elimina este comentario.
            -->
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\UserController::class, 'getShow'], ['id' => $i] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>

    </div>

    @endfor

</div>


@endsection
