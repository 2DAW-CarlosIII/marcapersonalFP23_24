@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar Currículum
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([App\Http\Controllers\CurriculoController::class, 'getEdit'], ['id' => $id]) }}" method="POST">
                @method('PUT')
	            @csrf

	            <div class="form-group">
	               <label for="user_id">Estudiante</label>
	               <input type="number" name="user_id" value="{{$curriculo['user_id']}}" id="user_id" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="video_curriculum">URL Videocurrículo</label>
	               <input type="url" name="video_curriculum" value=" {{$curriculo['video_curriculum']}}" id="video_curriculum">
	            </div>

	            <div class="form-group">
	            	<label for="texto_curriculum">Texto del currículo</label>
	               <input type="text" name="texto_curriculum" value="{{$curriculo['texto_curriculum']}}" id="texto_curriculum" class="form-control">
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

