@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir Docente
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ url('/docentes/create') }}" method="POST">

	            @csrf

	            <div class="form-group">
	               <label for="nombre">Nombre:</label>
	               <input type="text" name="nombre" id="nombre" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="apellidos">Apellidos:</label>
	                <input type="text" name="apellidos" id="apellidos">
	            </div>

                <div class="form-group">
	            	<label for="direccion">Direccion:</label>
                    <textarea name="direccion" id="direccion"></textarea>
	            </div>

	            <div class="form-group">
	            	<label for="departamento">Departamento:</label>
                    <input type="text" id="departamento" name="departamento" class="form-control">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;" >
	                   Añadir Docente
	               </button>
	            </div>

            </form>
         </div>
      </div>
   </div>
</div>

@endsection
