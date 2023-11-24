@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img width="256" alt="Curriculum-vitae-warning-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png">

        </div>
        <div class="col-sm-8">

            <h3><strong>User_id: </strong>{{ $curriculo['user_id'] }}</h3>
            <h4><strong>Video: </strong>
                <a href="http://github.com/2DAW-CarlosIII/{{ $curriculo['video_curriculum'] }}">
                    http://github.com/2DAW-CarlosIII/{{ $curriculo['video_curriculum'] }}
                </a>
            </h4>
            <p><strong>Texto curriculo: </strong> {{$curriculo['texto_curriculum']}}</p>

            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\CurriculoController::class, 'getIndex']) }}">
                Volver al listado
            </a>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\CurriculoController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar proyecto
            </a>
        </div>
    </div>

@endsection
