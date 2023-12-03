@extends('layouts.master')
@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar estudiante
                </div>
                <div class="card-body" style="padding:30px">
                    <form action="{{ action([App\Http\Controllers\EstudianteController::class, 'putEdit'], ['id' => $id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{ $estudiante->nombre }}"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" value="{{ $estudiante->apellidos }}">
                        </div>

                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" id="direccion" value="{{ $estudiante->direccion }}">
                        </div>

                        <div class="form-group">
                            <label for="votos">Votos</label>
                            <input type="number" name="votos" id="votos" value="{{ $estudiante->votos }}">
                        </div>

                        <div class="form-group">
                            <label for="confirmado">Confirmado</label>
                            <input type="checkbox" name="confirmado" id="confirmado" value="{{ $estudiante->confirmado }}">
                        </div>

                        <div class="form-group">
                            <label for="ciclo">Ciclo</label>
                            <input type="text" name="ciclo" id="ciclo" value="{{ $estudiante->ciclo }}">
                        </div>

                        <div class="form-group">
                            <label for="user_id">Id de usuario</label>
                            <input type="number" name="user_id" id="user_id" value="{{ $estudiante->user_id }}">
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar estudiante
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
