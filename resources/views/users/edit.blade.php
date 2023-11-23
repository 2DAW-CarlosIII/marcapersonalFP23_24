@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar Usuario
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([App\Http\Controllers\UserController::class, 'putEdit'], ['id' => $id]) }}" method="POST">

	            @csrf
                @method('PUT')

	            <div class="form-group">
	               <label for="first_name">Nombre</label>
	               <input type="text" name="first_name" id="first_name" value="{{$arrayUsers['first_name']}}" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="last_name">Apellidos</label>
	               <input type="text" name="last_name" value="{{ $arrayUsers['last_name'] }}" id="last_name">
	            </div>

                <div class="form-group">
	            	<label for="email">Email</label><br />
	               <input type="email" name="email" id="email" value="{{ $arrayUsers['email'] }}" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="password1">Contraseña</label><br />
	               <input type="password" name="password1" id="password1" value="{{ $arrayUsers['password'] }}" class="form-control">
	            </div>

                <div class="form-group">
	            	<label for="linkedin">Perfil linkedin</label><br />
	               <input type="url" name="linkedin" id="linkedin" value="{{ $arrayUsers['linkedin'] }}" class="form-control">
	            </div>



	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar usuario
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection

