<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculo;

class CurriculoController extends Controller
{
    public function getIndex(){

        $curriculo = Curriculo::all();
        return view('curriculos.index', ['curriculos' => $curriculo]);
    }

    public function getShow($id){
        $curriculo = Curriculo::findOrFail($id);

        return view('curriculos.show')
            ->with('curriculo', $curriculo);
    }

    public function getCreate(){
        return view('curriculos.create');
    }

    public function putEdit(Request $request, $id){
        $curriculo = Curriculo::findOrFail($id);

        if($request->hasFile('archivo_curriculum')){

            $path = $request->file('archivo_curriculum')->store('ficheros', ['disk' => 'public']);
            $curriculo->archivo_curriculum= $path;
        }

        $curriculo->save();
        $curriculo->update($request->all());

        return redirect(action([self::class, 'getShow'], ['id' => $curriculo->id]));
    }

    public function getEdit($id){
        $curriculo = Curriculo::findOrFail($id);

        return view('curriculos.edit')
        ->with('curriculo', $curriculo);
    }

    public function store(Request $request) {
        $curriculo = Curriculo::create($request->all());

        return redirect(action([self::class, 'getShow'], ['id' => $curriculo->id]));
    }
}
