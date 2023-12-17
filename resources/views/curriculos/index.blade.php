@extends('layouts.master')

@section('content')

<div class="row">
    @foreach ($curriculos as $curriculo)
        <div class="col-4 col-6-medium col-12-small">
            <section class="box">
                <a href="{{ action([App\Http\Controllers\CurriculoController::class, 'getShow'], ['id' => $curriculo->id] ) }}" class="image featured" title="SleaY, CC BY 4.0 &lt;https://creativecommons.org/licenses/by/4.0&gt;, via Wikimedia Commons">
                    @if ($curriculo->avatar)
                        <img width="256" src="{{ Storage::url($curriculo->avatar) }}" alt="Avatar" class="img-thumbnail">
                    @else
                        <img width="256" alt="Curriculum-vitae-warning-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png">
                    @endif
                </a>
                <header>
                    <h3>{{ $curriculo->nombre }} {{ $curriculo->apellidos }}</h3>
                </header>
                <p>
                    <a href="{{ $curriculo->video_curriculum }}">
                        {{ $curriculo->video_curriculum }}
                    </a>
                </p>
                <footer>
                    <ul class="actions">
                        <li>
                            <a href="{{ action([App\Http\Controllers\CurriculoController::class, 'getShow'], ['id' => $curriculo->id] ) }}" class="button alt">Más info</a>
                        </li>
                    </ul>
                </footer>
            </section>
        </div>
    @endforeach
</div>

@endsection
