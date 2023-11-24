@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir curriculo
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ url('/curriculos/create') }}" method="POST">

	            @csrf

                <div class="form-group">
                    <label for="user_id">User id</label>
                    <input type="text" name="user_id" id="user_id" class="form-control">
                 </div>

	            <div class="form-group">
	               <label for="videoUrl">Video url</label>
	               <input type="text" name="videoUrl" id="videoUrl" class="form-control">
	            </div>

	            <div class="form-group">
	               <label for="cualidades">Cualidades</label>
	               <textarea name="cualidades" id="cualidades" class="form-control" rows="3"></textarea>
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Añadir curriculo
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
