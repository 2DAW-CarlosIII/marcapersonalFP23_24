@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir reconocimiento
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ url('/reconocimiento/create') }}" method="POST">

	            @csrf

	            <div class="form-group">
	               <label for="idEstudiante">ID de Estudiante</label>
	               <input type="number" name="idEstudiante" id="idEstudiante" class="form-control">
	            </div>

	            <div class="form-group">
	                <label for="idActividad">ID de Actividad</label>
	                <input type="number" name="idActividad" id="idActividad">
	            </div>

	            <div class="form-group">
	            	<label for="documento">Documento</label>
                    https://drive.google.com/document/
	               <input type="text" name="documento" id="documento" class="form-control">
	            </div>

	            <div class="form-group">
	               <label for="fecha">Fecha</label>
	               <input type="date" name="fecha" id="fecha" class="form-control">
	            </div>

                <div class="form-group">
                    <label for="docente">Docente Validador</label>
                    <input type="number" name="docente" id="docente" class="form-control">
                 </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Añadir reconocimiento
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
