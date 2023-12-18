@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir Actividad
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([App\Http\Controllers\ActividadController::class, 'store']) }}" method="POST">

	            @csrf

	            <div class="form-group">
	            	<label for="docente_id">Docente</label>
	               <input type="number" name="docente_id" id="docente_id" class="form-control">
	            </div>

                <div class="form-group">
	            	<label for="insignia">Insignia</label>
                    <select name="insignia" id="insignia">
                        @foreach ($insignias as $insignia)
                            <option value="{{ $insignia }}">{{ $insignia}}</option>
                        @endforeach
                    </select>
	            </div>


	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Añadir Actividad
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
