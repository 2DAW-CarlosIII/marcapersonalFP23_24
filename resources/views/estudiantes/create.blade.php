@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir Estudiante
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ url('/estudiantes/create') }}" method="POST">

	            @csrf

	            <div class="form-group">
	               <label for="first_name">Nombre:</label>
	               <input type="text" name="first_name" id="first_name" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="last_name">Apellidos:</label>
	                <input type="text" name="last_name" id="last_name">
	            </div>

                <div class="form-group">
	            	<label for="ciclo">Ciclo:</label>
	                <input type="text" name="ciclo" id="ciclo">
	            </div>

                <div class="form-group">
	            	<label for="votes">Votos:</label>
	                <input type="text" name="votes" id="votes">
	            </div>

                <div class="form-group">
	            	<label for="address">Direccion:</label>
	                <input type="text" name="address" id="address">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Añadir Estudiante
	               </button>
	            </div>

            </form>
         </div>
      </div>
   </div>
</div>

@endsection
