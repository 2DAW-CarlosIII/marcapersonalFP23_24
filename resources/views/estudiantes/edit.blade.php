@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar Estudiante
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{action([App\Http\Controllers\EstudianteController::class, 'putEdit'], ['id' => $id])}}" method="POST">
                @method('PUT')
	            @csrf

	            <div class="form-group">
	               <label for="first_name">Nombre:</label>
	               <input type="text" name="first_name" id="first_name" value="{{ $estudiante->nombre }}">
	            </div>

	            <div class="form-group">
	            	<label for="last_name">Apellidos:</label>
	                <input type="text" name="last_name" id="last_name" value="{{ $estudiante->apellidos }}">
	            </div>

                <div class="form-group">
	            	<label for="ciclo">Ciclo:</label>
	                <input type="text" name="ciclo" id="ciclo" value="{{ $estudiante->ciclo }}">
	            </div>

                <div class="form-group">
	            	<label for="votes">Votos:</label>
	                <input type="text" name="votes" id="votes" value="{{ $estudiante->votos }}">
	            </div>

                <div class="form-group">
	            	<label for="address">Direccion:</label>
	                <input type="text" name="address" id="address"  value="{{ $estudiante->direccion }}">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar Estudiante
	               </button>
	            </div>

            </form>
         </div>
      </div>
   </div>
</div>

@endsection
