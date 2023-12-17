<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Http\Requests\ProyectoFormRequest;
use Illuminate\Support\Facades\Storage;


class CatalogController extends Controller
{
    public function getIndex()
    {
        $proyecto = Proyecto::all();
        return view('catalog.index', ['arrayProyectos' => $proyecto]);
    }

    public function getShow($id)
    {
        $proyecto = Proyecto::FindOrFail($id);
        //$proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.show')
            ->with('proyecto', $proyecto)
            ->with('id', $proyecto->id);
    }

    public function putEdit(ProyectoFormRequest $request, $id) {

        $proyecto = Proyecto::findOrFail($id);

        // Verificar si se proporcionó un nuevo archivoProyecto y es válido
        if ($request->hasFile('archivoProyecto') && $request->file('archivoProyecto')->isValid()) {
            // Eliminar el archivoProyecto anterior si existe
            if ($proyecto->archivoProyecto) {
                // Utiliza unlink o Storage para eliminar el archivo
                // unlink(public_path('storage/' . $proyecto->archivoProyecto));
                Storage::disk('public')->delete($proyecto->archivoProyecto);
            }

            // Almacenar el nuevo archivoProyecto
            $path = $request->file('archivoProyecto')->store('compressed_files', ['disk' => 'public']);
            $proyecto->archivoProyecto = $path;
        }//TODO ->
        /*else {
        // Devolver un mensaje en caso de que el archivo no sea válido
        return redirect()->back()->with('error', 'El archivo del proyecto no es válido.');*/

        // Actualizar los demás campos excluyendo archivoProyecto
        $proyecto->update($request->except('archivoProyecto'));

        // Redirigir a la vista de detalles del proyecto
        return redirect()->action([self::class, 'getShow'], ['id' => $proyecto->id]);
    }

    public function getEdit($id)
    {
        $proyecto = Proyecto::FindOrFail($id);
        //$proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.edit')
            ->with('proyecto', $proyecto)
            ->with('id', $proyecto->id);
    }

    public function getCreate()
    {
        return view('catalog.create');
    }

    public function store(Request $request) {

        if ($request->hasFile('archivoProyecto') && $request->file('archivoProyecto')->isValid()) {
            $proyecto = Proyecto::create($request->all());
        }else{
            $proyecto = Proyecto::create($request->except('archivoProyecto'));
        }
        return redirect(action([self::class, 'getShow'], ['id' => $proyecto->id]));
    }
}
