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
	               <label for="Estudiante">estudiante_id</label>
	               <input type="number" name="estudiante_id" id="estudiante_id" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="Actividad">Docente</label>
	               <input type="number" name="actividad_id" id="actividad_id">
	            </div>

	            <div class="form-group">
	            	<label for="URL del documento">documento</label><br/>
                    https://github.com/2DAW-CarlosIII/
	               <input type="url" name="documento" id="documento" class="form-control">
	            </div>

	            <div class="form-group">
	               <label for="Fecha">fecha</label>
	               <input type ="date" name="fecha" id="fecha" class="form-control" rows="3">
	            </div>

                <div class="form-group">
	            	<label for="Docente Validador">Docente</label>
	               <input type="number" name="docente_validador" id="docente_validador">
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
