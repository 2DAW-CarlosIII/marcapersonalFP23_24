<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
//use App\Http\Requests\ProyectoFormRequest;
use Illuminate\Support\Facades\Validator;


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

    public function putEdit(Request $request, $id) {
        $proyecto = Proyecto::findOrFail($id);
        // TODO: Eliminar el avatar anterior si existiera

        //$archivoVar = $request->validate();

        if ($proyecto->archivoProyecto && isset($archivoVar)){

            $proyecto->archivoProyecto->delete();

            $validator = Validator::make(
                array(
                    'archivoProyecto' => $request('archivoProyecto'),
                ),
                array(
                    'archivoProyecto' => 'file|max:5000|mimes:zip,7z,tar,rar',
                )
            );
            $path = $request->file('archivoProyecto')->store('compressed_files', ['disk' => 'public']);
            $proyecto->archivoProyecto->update($path);
        }

        //$metadatosVar = serialize($request->only('metadatos'));
        //$proyecto->metadatos->update($metadatosVar);

        $proyecto->update($request->except('archivoProyecto'));
        return redirect(action([self::class, 'getShow'], ['id' => $proyecto->id]));
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
        $proyecto = Proyecto::create($request->all());

        return redirect(action([self::class, 'getShow'], ['id' => $proyecto->id]));
    }
}
