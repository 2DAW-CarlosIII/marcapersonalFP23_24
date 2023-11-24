@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar reconocimiento
                </div>
                <div class="card-body" style="padding:30px">

                    <form
                        action="{{ action([App\Http\Controllers\ReconocimientoController::class, 'putEdit'], ['id' => $id]) }}"
                        method="POST">

                        @method('PUT')

                        @csrf

                        <div class="form-group">
                            <label for="Id Estudiante">Id Estudiante</label>
                            <input type="text" name="Id Estudiante" id="Id Estudiante"
                                value="{{ $reconocimiento['estudiante_id'] }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="docente_validador">Docente</label>
                            <input type="number" name="docente_validador" id="docente_validador"
                                value="{{ $reconocimiento['docente_validador'] }}">
                        </div>

                        <div class="form-group">
                            <label for="documento">Documento</label>
                            <input type="text" name="documento" id="documento" value="{{ $reconocimiento['documento'] }}"
                                class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar reconocimiento
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
