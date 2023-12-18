@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <a href="#" class="image featured" title="Sakatsp, CC BY-SA 4.0 &lt;https://creativecommons.org/licenses/by-sa/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Award icon" src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png"></a>

        </div>
        <div class="col-sm-8">

            <h3>Estudiante</h3>
                <h5>{{ $reconocimiento->estudiante->nombre }} {{ $reconocimiento->estudiante->apellidos }}</h5>
                <br>
                <h3>Nombre actividad</h3>
                <h5>{{ $reconocimiento->actividad->nombre }}</h5>
                <br>
                <h3>Documento</h3>
                <h5>{{ $reconocimiento->documento }}</h5>
                <br>
                <h3>Fecha</h3>
                <h5>{{ $reconocimiento->fecha }}</h5>
                <br>
            @if ($reconocimiento->docente_validador)
                <h3>Validado por</h3>
                <h5>{{ $reconocimiento->user->nombre }} {{ $reconocimiento->user->apellidos}}</h5>
            @else
            <form action="{{ action([App\Http\Controllers\ReconocimientoController::class, 'putValidador'], ['id' => $reconocimiento->id]) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Input oculto para recoger valor de docente_validador --}}
                <input type="hidden" name="docente_validador" id="docente_validador" value="{{ auth()->id() }}">

                <button type="submit" class="btn btn-success">Validar</button>
            </form>


            @endif

            <br>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getEdit'], ['id' => $reconocimiento->id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar Reconocimiento
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getIndex']) }}">
                Volver al listado
            </a>



        </div>
    </div>

@endsection
