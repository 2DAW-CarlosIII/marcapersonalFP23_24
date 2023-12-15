@extends('layouts.master')

@section('content')
    <div class="row m-4">
        <div class="col-sm-4">
            <img width="300" style="height:300px" alt="Curriculum-vitae-warning-icon"
                src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png">
        </div>

        <div class="col-sm-8  align-self-center">
            <h3><strong>Identificador del usuario:</strong> {{ $curriculo->user_id }}</h3>
            </br>
            <h4><strong>Video Curriculum:</strong> <a
                    href="{{ $curriculo->video_curriculum }}">{{ $curriculo->video_curriculum }}</a></h4>
            @if ($curriculo->pdf_curriculum)
                <a href="{{ Storage::url($curriculo->pdf_curriculum) }}" download="curriculo.pdf">Descargar currículo </a>
            @else
                <h4>Ningún currículo asociado</h4>
            @endif </br>
            <a class="btn btn-warning"
                href="{{ action([App\Http\Controllers\CurriculoController::class, 'getEdit'], ['id' => $curriculo->id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar Curriculum
            </a>

            <a class="btn btn-outline-info"
                href="{{ action([App\Http\Controllers\CurriculoController::class, 'getIndex']) }}">
                Volver al listado
            </a>
        </div>
    </div>
@endsection
