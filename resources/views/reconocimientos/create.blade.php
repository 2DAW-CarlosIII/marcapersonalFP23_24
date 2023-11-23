@extends('layouts.master')

@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Añadir reconocimiento
                </div>
                <div class="card-body" style="padding:30px">

                    <form action="{{ url('/reconocimientos/create') }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="id_estudiante">Id estudiante</label>
                            <input type="text" name="id_estudiante" id="id_estudiante" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="docente_validador">Docente</label>
                            <input type="number" name="docente_validador" id="docente_validador">
                        </div>

                        <div class="form-group">
                            <label for="dominio">Documento</label>
                            <input type="text" name="dominio" id="dominio" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="metadatos">Observaciones</label>
                            <textarea name="metadatos" id="metadatos" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Añadir reconocimiento
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
