@extends('layouts.master')

@section('content')
    <div class="row mt-4">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar Currículum
                </div>
                <div class="card-body p-4">

                    <form action="{{ action([App\Http\Controllers\CurriculoController::class, 'putEdit'], ['id' => $id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="user_id">Estudiante</label>
                            <input type="number" name="user_id" id="user_id" class="form-control"
                                value="{{ $curriculo->user_id }}">
                        </div>

                        <div class="form-group">
                            <label for="video_curriculum">URL Videocurrículo</label>
                            <input type="url" name="video_curriculum" id="video_curriculum" class="form-control"
                                value="{{ $curriculo->video_curriculum }}">
                        </div>

                        <div class="form-group">
                            <label for="texto_curriculum">Texto del currículo</label>
                            <textarea name="texto_curriculum" id="texto_curriculum" class="form-control">
                            {{ print_r($curriculo->texto_curriculum, true) }}
                        </textarea>
                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar Currículum
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
