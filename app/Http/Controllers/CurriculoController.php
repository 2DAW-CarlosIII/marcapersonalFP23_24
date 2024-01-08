<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculo;
use App\Models\User;

class CurriculoController extends Controller
{
    public function getIndex(){
        $curriculos = Curriculo::join('users', 'curriculos.user_id', '=', 'users.id')
                           ->select('curriculos.*', 'users.nombre', 'users.apellidos', 'users.avatar')
                           ->get();
        return view('curriculos.index')
            ->with('curriculos', $curriculos);
    }

    public function getShow($id)
    {
        $curriculo = Curriculo::findOrFail($id);
        $user = User::findOrFail($curriculo->user_id);

        return view('curriculos.show')
            ->with('curriculo', $curriculo)
            ->with('user', $user);
    }

    public function getCreate()
    {
        return view('curriculos.create');
    }

    public function putEdit(Request $request, $id)
    {
        $curriculo = Curriculo::findOrFail($id);
        $curriculo->update($request->all());
        if ($request->hasFile('pdf_curriculum') && $request->pdf_curriculum->getClientOriginalExtension() === 'pdf') {
            $path = $request->file('pdf_curriculum')->store('curriculos', ['disk' => 'public']);
            $curriculo->pdf_curriculum = $path;
            $curriculo->save();
        }
        return redirect(action([self::class, 'getShow'], ['id' => $curriculo->id]));
    }

    public function getEdit($id)
    {
        $curriculo = Curriculo::findOrFail($id);

        return view('curriculos.edit')
            ->with('curriculo', $curriculo);
    }

    public function store(Request $request)
    {
        $curriculo = new Curriculo();
        $curriculo->user_id = $request->user()->id;
        if ($request->hasFile('pdf_curriculum') && $request->pdf_curriculum->getClientOriginalExtension() === 'pdf') {
            $path = $request->file('pdf_curriculum')->store('curriculos', ['disk' => 'public']);
            $curriculo->pdf_curriculum = $path;
        }

        $curriculo->save();

        return redirect(action([self::class, 'getShow'], ['id' => $curriculo->id]));

    }
}
