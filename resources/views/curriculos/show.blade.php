@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <a href="#" class="image featured" title="SleaY, CC BY 4.0 &lt;https://creativecommons.org/licenses/by/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Curriculum-vitae-warning-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png"></a>

        </div>
        <div class="col-sm-8">

            <h3><strong>Usuario: </strong>{{ $curriculo['user_id'] }}</h3>
                {{ $curriculo['texto_curriculum'] }}
                <a href="{{ $curriculo['video_curriculum'] }}"><br>
                {{ $curriculo['video_curriculum'] }}
                </a>
                <br>
            </h4>

            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\CurriculoController::class, 'getEdit'], ['id' => $id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar curriculo
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\CurriculoController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection
