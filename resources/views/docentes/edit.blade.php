@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar docente
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([App\Http\Controllers\DocenteController::class, 'putEdit'], ['id' => $docente->id]) }}" method="POST">

	            @csrf
                @method('PUT')

	            <div class="form-group">
	               <label for="nombre">Nombre</label>
	               <input type="text" name="nombre" id="nombre" value="{{$docente->nombre }}" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="apellidos">Apellidos</label>
	               <input type="text" name="apellidos" value="{{$docente->apellidos }}" id="apellidos" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="direccion">Direccion</label>
	               <input type="text" name="direccion" id="direccion" value="{{ $docente->direccion }}" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="departamento">Departamento</label>
	               <input type="text" name="departamento" id="departamento" value="{{ $docente->departamento }}" class="form-control">
	            </div>

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Modificar docente
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
