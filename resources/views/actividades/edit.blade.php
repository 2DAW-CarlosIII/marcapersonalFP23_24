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

                <input type="hidden" name="icono">
                <div class="form-group">
                    <label for="insignia">Insignia</label>
                    <i class="{{$actividad->insignia}}"></i>
                    <select name="insignia" id="insignia">
                    @foreach ($iconos as $icono)
                        <option value="{{$icono}}"><span class="{{$icono}}">{{$icono}}</span></option>
                    @endforeach
                    </select>
                </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar Actividad
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
