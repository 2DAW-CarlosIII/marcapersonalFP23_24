@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
<<<<<<< HEAD
            Añadir Usuario
=======
            Añadir usuario
>>>>>>> 824fc149a9afd56b31838ad4421e0337c2c1abdd
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ url('/users/create') }}" method="POST">

	            @csrf

	            <div class="form-group">
<<<<<<< HEAD
	               <label for="first_name">Nombre:</label>
	               <input type="text" name="first_name" id="first_name" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="last_name">Apellidos:</label>
	                <input type="text" name="last_name" id="last_name">
	            </div>

                <div class="form-group">
	            	<label for="email">Email:</label>
	                <input type="email" name="email" id="email">
	            </div>

                <div class="form-group">
	            	<label for="password1">Contraseña:</label>
	                <input type="password" name="password1" id="password1">
	            </div>

                <div class="form-group">
	            	<label for="password2">Repita contraseña:</label>
	                <input type="password" name="password2" id="password2">
	            </div>

	            <div class="form-group">
	            	<label for="linkedin">Perfil Linkedin:</label>
                    <input type="url" id="linkedin" name="linkedin">
=======
	               <label for="first_name">Nombre</label>
	               <input type="text" name="first_name" id="first_namefirst_name" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="last_name">Apellidos</label>
	               <input type="text" name="last_name" id="last_name">
	            </div>

                <div class="form-group">
	            	<label for="password1">Contraseña</label>
	               <input type="password" name="password1" id="password1">
	            </div>

                <div class="form-group">
	            	<label for="password2">Repita contraseña</label>
	               <input type="password" name="password2" id="password2">
	            </div>

	            <div class="form-group">
	            	<label for="linkedin">Perfil Linkedin</label><br />
	               <input type="url" name="linkedin" id="linkedin" class="form-control">
>>>>>>> 824fc149a9afd56b31838ad4421e0337c2c1abdd
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
<<<<<<< HEAD
	                   Añadir Usuario
=======
	                   Añadir usuario
>>>>>>> 824fc149a9afd56b31838ad4421e0337c2c1abdd
	               </button>
	            </div>

            </form>
<<<<<<< HEAD
=======

>>>>>>> 824fc149a9afd56b31838ad4421e0337c2c1abdd
         </div>
      </div>
   </div>
</div>

@endsection
<<<<<<< HEAD
=======

>>>>>>> 824fc149a9afd56b31838ad4421e0337c2c1abdd
