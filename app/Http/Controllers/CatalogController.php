<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use App\Models\Proyecto;

class CatalogController extends Controller
{
<<<<<<< HEAD
    public function getIndex(){
        $proyectos = Proyecto::all();
        return view('catalog.index',['arrayProyectos'=>$proyectos]);
=======
    public function getIndex()
    {
        return view('catalog.index')
            ->with('arrayProyectos', Proyecto::all());
>>>>>>> issueDocentes
    }

    public function getShow($id)
    {
<<<<<<< HEAD
        $proyecto = Proyecto::findOrFail($id);
=======
        $proyecto = Proyecto::findorfail($id);
        //LA FORMA EN LA QUE SE ALMACENA LOS METADATOS(EL ARRAY LO SERIALIZA(CONVIERTE A TEXTO)) EN LA TABLA HAY QUE DESERIALIZARLA PARA PODER CONVERTIRLA DE NUEVO EN UN ARRAY.
>>>>>>> issueDocentes
        $proyecto->metadatos = unserialize($proyecto->metadatos);

        return view('catalog.show')
            ->with('proyecto', $proyecto)
            ->with('id', $id);
    }

<<<<<<< HEAD
    public function putEdit($id) {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);

        return view('catalog.edit')
            ->with("proyecto",$proyecto)
            ->with("id",$id);
    }

    public function getEdit($id) {

        $proyecto = Proyecto::findOrFail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);

        return view('catalog.edit')
            ->with("proyecto",$proyecto)
            ->with("id",$id);
=======
    public function putEdit($id)
    {
        $proyecto = Proyecto::findorfail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);

        return view('catalog.edit')
        ->with('proyecto', $proyecto)
            ->with("id", $id);
    }

    public function getEdit($id)
    {
        $proyecto = Proyecto::findorfail($id);
        $proyecto->metadatos = unserialize($proyecto->metadatos);
        return view('catalog.edit')
        ->with('proyecto', $proyecto)
            ->with("id", $id);
>>>>>>> issueDocentes
    }

    public function getCreate()
    {
        return view('catalog.create');
    }
<<<<<<< HEAD


=======
>>>>>>> issueDocentes
}
