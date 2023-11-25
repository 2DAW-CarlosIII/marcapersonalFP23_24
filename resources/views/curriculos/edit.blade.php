@extends('layouts.master')


@section('content')
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar currículo
                </div>
                <div class="card-body" style="padding:30px">


                    <form action="action([App\Http\Controllers\CurriculoController::class, 'getEdit'], ['id' => $id])"
                        method="POST">
                        @method('PUT')
                        @csrf


                        <div class="form-group">
                            <label for="estudiante">Estudiante</label>
                            <input type="number" name="estudiante" id="estudiante" class="form-control">
                        </div>


                        <div class="form-group">
                            <label for="url">URL Videocurrículo</label>
                            <input type="url" name="url" id="url">
                        </div>


                        <div class="form-group">
                            <label for="texto">Texto del currículo</label>
                            <input type="textarea" name="texto" id="texto" class="form-control">
                        </div>


                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar currículum
                            </button>
                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
