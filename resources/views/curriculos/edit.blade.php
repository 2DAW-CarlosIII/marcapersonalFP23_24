@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar Currículum
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([App\Http\Controllers\CurriculoController::class, 'putEdit'], ['id' => $id]) }}" method="POST">
	            @csrf
                @method('PUT')

	            <div class="form-group">
	               <label for="estudiante">Estudiante</label>
	               <input type="number" name="user_id" id="user_id" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="URL Videocurrículo	">URL Videocurrículo	</label>
	               <input type="url" name="video_currículum	" id="video_currículum	">
	            </div>

	            <div class="form-group">
	            	<label for="Texto del currículo">Texto del currículo</label>
	               <input type="textarea" name="texto_curriculum" id="texto_curriculum" class="form-control">
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
