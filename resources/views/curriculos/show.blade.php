@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Usuario: </strong>{{ $curriculo['user_id'] }}</h3>
            <h4><strong>Dominio: </strong>
                <a href="{{ $curriculo['video_curriculum'] }}">
                    {{ $curriculo['texto_curriculum'] }}
                </a>
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
