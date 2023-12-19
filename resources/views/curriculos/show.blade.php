@extends('layouts.master')

@section('content')
<div class="row m-4">
    <div class="col-sm-4">
        @if ($user->avatar)
            <img width="300" style="height:300px" src="{{ Storage::url($user->avatar) }}" alt="Avatar" class="img-thumbnail">
        @else
            <img width="300" style="height:300px" alt="Curriculum-vitae-warning-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png">
        @endif
    </div>

    <div class="col-sm-8  align-self-center">

        <h3><strong>Nombre:</strong> {{ $user->nombre }} {{ $user->apellidos }}</h3>
        </br>

        <h4 class="mb-2"><strong>Video Curriculum:</strong> </h4>

        <iframe width="560" height="315"
            src="https://www.youtube.com/embed/{{ $curriculo->video_curriculum }}"
            title="YouTube video player"
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
        </iframe>
        </br>

        @if ($curriculo->pdf_curriculum)
            <a class="btn btn-danger mb-3"
                href="{{ Storage::url($curriculo->pdf_curriculum) }}" download="curriculo.pdf">
                <i class="bi bi-download me-2"></i> Currículo
            </a>
        @else
            <h4 class="mb-3">Ningún currículo asociado</h4>
        @endif
        </br>

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
