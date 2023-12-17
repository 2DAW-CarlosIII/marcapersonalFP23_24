@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir proyecto
         </div>
         <div class="card-body" style="padding:30px">

<<<<<<< HEAD
            <form action="{{ action([App\Http\Controllers\CatalogController::class, 'store']) }}" method="POST" enctype="multipart/form-data">
=======
            <form action="{{ action([App\Http\Controllers\CatalogController::class, 'store']) }}" method="POST">
>>>>>>> master

	            @csrf

	            <div class="form-group">
	               <label for="nombre">Nombre</label>
	               <input type="text" name="nombre" id="nombre" class="form-control">
	            </div>

	            <div class="form-group">
	            	<label for="docente_id">Docente</label>
	               <input type="number" name="docente_id" id="docente_id">
	            </div>

	            <div class="form-group">
	            	<label for="dominio">Dominio</label><br />
                    https://github.com/2DAW-CarlosIII/
	               <input type="text" name="dominio" id="dominio" class="form-control">
	            </div>

	            <div class="form-group">
	               <label for="metadatos">Metadatos</label>
	               <textarea name="metadatos" id="metadatos" class="form-control" rows="3"></textarea>
                   <br /><small>Cada metadato irá separado del siguiente por una línea <br />
                   y la clave irá separada por : del valor</small>
	            </div>

                <div class="form-group">
<<<<<<< HEAD
                    <label for="archivoProyecto">Archivo Proyecto (comprimido)</label>
                    <input type="file" accept=".zip,.rar,.7z,.tar" class="form-control" id="archivoProyecto" name="archivoProyecto" placeholder="archivoProyecto">
                </div>
=======
	            	<label for="calificacion">Calificación</label>
	               <input type="number" name="calificacion" id="calificacion">
	            </div>
>>>>>>> master

	            <div class="form-group text-center">
	               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
	                   Añadir proyecto
	               </button>
	            </div>

            </form>

         </div>
      </div>
   </div>
</div>

@endsection
