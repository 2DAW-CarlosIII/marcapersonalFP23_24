@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir estudiante
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ url('/estudiantes/create') }}" method="POST">

	            @csrf

	            <div class="form-group">
	               <label for="nombre">Nombre</label>
	               <input type="text" name="nombre" id="nombre" class="form-control">
	            </div>

                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control">
                </div>

                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control">
                </div>

	            <div class="form-group">
	            	<label for="votos">Votos</label>
	               <input type="number" name="votos" id="votos" class="form-control">
	            </div>

                <div class="form-group">
	            	<label for="confirmado">Confirmado</label>
	               <input type="checkbox" name="confirmado" id="confirmado" class="form-control">
	            </div>

                <div class="form-group">
	            	<label for="ciclo">Ciclo</label>
	               <input type="text" name="ciclo" id="ciclo" class="form-control">
	            </div>

                <div class="form-group">
	            	<label for="user_id">Id de usuario</label>
	               <input type="number" name="user_id" id="user_id" class="form-control">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Añadir estudiante
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
