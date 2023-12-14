@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar Usuario
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([App\Http\Controllers\UserController::class, 'putEdit'], ['id' => $user['id']]) }}" method="POST" enctype="multipart/form-data">

	            @csrf
                @method('PUT')

	            <div class="form-group">
	               <label for="first_name">Nombre:</label>
	               <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user['first_name'] }}">
	            </div>

	            <div class="form-group">
	            	<label for="last_name">Apellidos:</label>
	                <input type="text" name="last_name" id="last_name" value="{{ $user['last_name'] }}">
	            </div>

                <div class="form-group">
	            	<label for="email">Email:</label>
	                <input type="email" name="email" id="email" value="{{ $user['email'] }}">
	            </div>

                <div class="form-group">
	            	<label for="password1">Contraseña:</label>
	                <input type="password" name="password1" id="password1" value="{{ $user['password'] }}">
	            </div>

                <div class="form-group">
	            	<label for="password2">Repita contraseña:</label>
	                <input type="password" name="password2" id="password2" value="{{ $user['password'] }}">
	            </div>

	            <div class="form-group">
	            	<label for="linkedin">Perfil Linkedin:</label>
                    <input type="url" id="linkedin" name="linkedin" class="form-control" value="{{ $user['linkedin'] }}">
	            </div>

                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Avatar">
                </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;" >
	                   Modificar Usuario
	               </button>
	            </div>

            </form>
         </div>
      </div>
   </div>
</div>

@endsection
