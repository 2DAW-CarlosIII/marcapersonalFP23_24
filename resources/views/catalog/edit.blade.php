@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Modificar proyecto
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{ action([App\Http\Controllers\CatalogController::class, 'putEdit'], ['id' => $id]) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group">
                   <label for="nombre">Nombre</label>
                   <input type="text" name="nombre" id="nombre" value="{{$proyecto['nombre']}}" class="form-control">
                </div>

                <div class="form-group">
	            	<label for="actividad_id">Actividad</label>
	               <select name="actividad_id" id="actividad_id">
                        @foreach ( $actividades as $actividad )
                            <option value="{{$actividad->id}}">{{ $actividad}}</option>
                        @endforeach
                   </select>
	            </div>

	            <div class="form-group">
	            	<label for="estudiante_id">Estudiante</label>
	               <select name="estudiante_id" id="estudiante_id">
                        @foreach ( $estudiantes as $estudiante )
                            <option value="{{$estudiante->id}}">{{ $estudiante->nombre }} {{ $estudiante->apellidos }}</option>
                        @endforeach
                   </select>
	            </div>

                <div class="form-group">
	            	<label for="docente_id">Docente</label>
	               <select name="docente_id" id="docente_id">
                        @foreach ( $docentes as $docente )
                            <option value="{{$docente->id}}">{{ $docente->nombre }} {{ $docente->apellidos }}</option>
                        @endforeach
                   </select>
	            </div>

                <div class="form-group">
                    <label for="dominio">Dominio</label><br />
                    https://github.com/2DAW-CarlosIII/
                   <input type="text" name="dominio" id="dominio" value="{{ $proyecto['dominio'] }}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="calificacion">Calificación</label>
                    <input type="number" name="calificacion" id="calificacion" value="{{$proyecto['calificacion']}}" min="1" max="10">
                 </div>

                <div class="form-group">
                   <label for="metadatos">Metadatos</label>
                   <textarea name="metadatos" id="metadatos" class="form-control" value rows="3">
                    {{print_r($proyecto['metadatos'],true)}}
                   </textarea>
                </div>

                <div class="form-group">
                    <label for="fichero">Fichero Comprimido</label>
                    <input type="file" class="form-control" id="fichero" name="fichero" placeholder="fichero">
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" placeholder="Imagen">
                </div>

                <div class="form-group text-center">
                   <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                       Modificar proyecto
                   </button>
                </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
