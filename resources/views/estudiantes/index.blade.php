@extends('layouts.master')

@section('content')

<div class="row">

    @foreach ($estudiantes as $estudiante)

    <div class="col-4 col-6-medium col-12-small">
        <section class="box">
            <a href="#" class="image featured" title="Nice and Serious, CC0, via Wikimedia Commons"><img width="256" alt="User (89041) - The Noun Project"
               src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/User_%2889041%29_-_The_Noun_Project.svg/256px-User_%2889041%29_-_The_Noun_Project.svg.png">
            </a>
            <header>
                <h3>{{ $estudiante->nombre }} {{ $estudiante->apellidos }}</h3>
            </header>
            <p>{{ $estudiante->ciclo }}</p>
            <footer>
                <ul class="actions text-center">
                    <li><a href="{{ action([App\Http\Controllers\EstudianteController::class, 'getShow'], ['id' => $estudiante->id] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endforeach

</div>
@endsection
