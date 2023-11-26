@extends('layouts.master')

@section('content')
    <div class="row m-4">

        <div class="col-sm-4">

            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Award_icon.png" style="height:200px" />

        </div>
        <div class="col-sm-8">
            <h3>Reconocimiento</h3>
            <h4><strong>Estudiante: </strong>{{ $reconocimiento['estudiante_id'] }}</h4>
            <h4><strong>Actividad: </strong>{{ $reconocimiento['actividad_id'] }}</h4>
            <h4><strong>Documento: </strong>{{ $reconocimiento['documento'] }}</h4>
            <h4><strong>Fecha: </strong>{{ $reconocimiento['fecha'] }}</h4>
            <h4><strong>Docente: </strong>{{ $reconocimiento['docente_validador'] }}</h4>

            <footer>
                <ul class="actions">
                    <li>
                        <a href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getEdit'], ['id' => $id]) }}"
                            class="button alt">
                            Editar
                        </a>
                    </li>
                    <li>
                        <a href="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getIndex']) }}"
                            class="button alt">
                            Volver al listado
                        </a>
                    </li>
                </ul>
            </footer>
            </section>
        </div>
    </div>
@endsection
