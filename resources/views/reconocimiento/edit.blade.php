@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar reconocimiento
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([App\Http\Controllers\ReconocimientoController::class, 'getEdit'], ['id' => $id]) }}" method="POST">

                @csrf
                @method('PUT')

	            <div class="form-group">
	               <label for="nombre">Estudiante</label>
	               <input type="number" name="estudiante_id" id="estudiante_id" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="docente_id">Actividad</label>
	               <input type="number" name="actividad_id" id="adctividad_id">
	            </div>

	            <div class="form-group">
	            	<label for="documento">URL del documento</label>
	               <input type="url" name="documento" id="documento" class="form-control">
	            </div>

	            <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input type="date" name="fecha" id="fecha" class="form-control">
                 </div>

	            <div class="form-group">
	            	<label for="docente_id">Docente</label>
	               <input type="number" name="docente_id" id="docente_id">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar reconocimiento
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
