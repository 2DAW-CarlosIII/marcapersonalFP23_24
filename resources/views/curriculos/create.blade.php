@extends('layouts.master')

@section('content')

<div class="row mt-4">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Añadir Currículum
            </div>
            <div class="card-body p-4">

                <form action="{{ action([App\Http\Controllers\CurriculoController::class, 'store']) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="user_id">Estudiante</label>
                        <input type="number" name="user_id" id="user_id" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="video_curriculum">URL Videocurrículo</label>
                        <input type="text" name="video_curriculum" id="video_curriculum" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="pdf_curriculum">Currículo</label>
                        <input type="file" class="form-control" id="pdf_curriculum" name="pdf_curriculum" accept=".pdf" placeholder="pdf_curriculum">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Añadir Currículum
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
