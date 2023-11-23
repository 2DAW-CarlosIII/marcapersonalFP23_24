@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir curriculum
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ url('/curriculos/create') }}" method="POST">

	            @csrf

	            <div class="form-group">
	               <label for="texto_curriculum">Descripcion</label>
	               <input type="text" name="texto_curriculum" id="texto_curriculum" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="video_curriculum">VideoCurriculum</label>
	               <input type="text" name="video_curriculum" id="video_curriculum">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Añadir curriculum
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
