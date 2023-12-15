@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="/images/mp-logo.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Nombre: </strong>{{ $proyecto['nombre'] }}</h3>
            <h4><strong>Dominio: </strong>
                <a href="http://github.com/2DAW-CarlosIII/{{ $proyecto['dominio'] }}">
                    http://github.com/2DAW-CarlosIII/{{ $proyecto['dominio'] }}
                </a>
            </h4>
            <br>
            <h4><strong>Docente: </strong>{{ $docente->nombre . ' ' . $docente->apellidos}}</h4>
            <br>
            {{-- CALIFICACIÓN --}}
            <p><strong>Calificación: </strong>
                {{$proyecto->calificacion}}
            </p>
            {{-- METADATOS --}}
            <p><strong>Metadatos: </strong>
                {{ $proyecto->metadatos }}
            </p>
            <p><strong>Estado: </strong>
                @if($proyecto->calificacion >= 5)
                    Proyecto aprobado
                @else
                    Proyecto suspenso
                @endif
            </p>

            <p>
                <h4>
                    @if ($proyecto->fichero)
                        <a href="{{ Storage::url($proyecto->fichero) }}" download="proyecto.rar">Fichero Comprimido</a>
                    @else
                        No se ha subisdo el proyecto aún.
                    @endif
                </h4>
            </p>

            @if($proyecto['metadatos']['calificacion'] >= 5)
                <a class="btn btn-danger" href="#">Suspender proyecto</a>
            @else
                <a class="btn btn-primary" href="#">Aprobar proyecto</a>
            @endif
            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\CatalogController::class, 'getEdit'], ['id' => $proyecto->id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar proyecto
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\CatalogController::class, 'getIndex']) }}">
                Volver al listado
            </a>


        </div>
    </div>

@endsection
