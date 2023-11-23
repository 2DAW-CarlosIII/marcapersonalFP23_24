@extends('layouts.master')

@section('content')
    <div class="row m-4">

        <div class="col-sm-4">

            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png" style="height:200px" />

        </div>
        <div class="col-sm-8">

            <h4><strong>ID de usuario: </strong>{{ $curriculo['user_id'] }}</h3>
                <h4><strong>Vídeo: </strong>
                    <a href="{{ $curriculo['video_curriculum'] }}">
                        {{ $curriculo['video_curriculum'] }}
                    </a>
                </h4>
                <h4><strong>Descripción: </strong>{{ $curriculo['texto_curriculum'] }}</h4>
                <p>

                    <br>
                    {{-- <a class="btn btn-warning"
                    href="{{ action([App\Http\Controllers\CurriculoController::class, 'getEdit'], ['id' => $id]) }}">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    Editar currículo
                </a> --}}
                    <a class="btn btn-outline-info"
                        href="{{ action([App\Http\Controllers\CurriculoController::class, 'getIndex']) }}">
                        Volver al listado
                    </a>

        </div>
    </div>
@endsection
