@extends('layouts.master')

@section('content')

<div class="row mt-4">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Añadir Currículum
            </div>
            <div class="card-body p-4">

                <form action="{{ url('/curriculos/create') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="user_id">Estudiante</label>
                        <input type="number" name="user_id" id="user_id" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="video_curriculum">URL Videocurrículo</label>
                        <input type="url" name="video_curriculum" id="video_curriculum" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="texto_curriculum">Texto del currículo</label>
                        <textarea name="texto_curriculum" id="texto_curriculum" class="form-control"></textarea>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">
                            Añadir Currículum
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
