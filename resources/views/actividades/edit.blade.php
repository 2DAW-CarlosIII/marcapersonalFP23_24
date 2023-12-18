@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar Actividad
         </div>
         <div class="card-body" style="padding:30px">

            <form href="{{ action([App\Http\Controllers\ActividadController::class, 'getEdit'], ['id' => $actividad->id]) }}" method="POST">
                @method('PUT')
	            @csrf

	            <div class="form-group">
	            	<label for="docente_id">Docente</label>
	               <input type="number" name="docente_id" id="docente_id" class="form-control" value="{{ $actividad->docente_id }}">
	            </div>

                <div class="form-group">
	            	<label for="insignia">Insignia</label>
	               <input type="url" name="insignia" id="insignia" class="form-control" value="{{ $actividad->insignia }}">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar Actividad
	               </button>
                   <a class="btn btn btn-danger" href="{{ action([App\Http\Controllers\ActividadController::class, 'getShow'], ['id' => $actividad->id]) }}" style="padding:8px 100px;margin-top:25px;">
                        Cancelar Edición
                   </a>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
