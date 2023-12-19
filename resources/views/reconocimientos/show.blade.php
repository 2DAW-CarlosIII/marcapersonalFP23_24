@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <a href="#" class="image featured" title="Sakatsp, CC BY-SA 4.0 &lt;https://creativecommons.org/licenses/by-sa/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Award icon" src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png"></a>

        </div>
        <div class="col-sm-8">

            <p><strong>Estudiante: </strong>{{ $reconocimiento->estudiante_nombre}} {{ $reconocimiento->estudiante_apellidos}}</p>
            <p><strong>Actividad: </strong>{{ $reconocimiento->actividad_nombre }}</p>
            <p><strong>Documento: </strong><a href="{{ $reconocimiento->documento }}">{{ $reconocimiento->documento }}</a></p>

            @if ($reconocimiento->docente_validador !== null)
                <p><strong>Validado por: </strong>{{ $reconocimiento->docente_nombre}} {{ $reconocimiento->docente_apellidos }}</p>
                <p><strong>Fecha: </strong>{{ $reconocimiento->fecha }}</p>
            @else
                <form action="{{ action([App\Http\Controllers\ReconocimientoController::class, 'valida'], ['id' => $reconocimiento->id]) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Validar</button>
                </form>
            @endif

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
