@extends('layouts.master')

@section('content')

<div class="row mt-4">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Añadir Estudiante
            </div>
            <div class="card-body p-4">

                <form action="{{ action([App\Http\Controllers\EstudianteController::class, 'store']) }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" name="apellidos" id="apellidos" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="text" name="direccion" id="direccion" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="votos">Votos</label>
                        <input type="number" name="votos" id="votos" class="form-control">
                    </div>

                    <div class="form-group">
                        <p>Confirmado: </p>
                    </div>

                    <div class="form-group">
                        <label for="ciclo">Ciclo</label>
                        <input type="text" name="ciclo" id="ciclo" class="form-control">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Añadir Estudiante
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
