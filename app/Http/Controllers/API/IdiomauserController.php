<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Idiomauser;
use Illuminate\Http\Request;
use App\Http\Resources\IdiomauserResource;
use App\Helpers\FilterHelper;

class IdiomauserController extends Controller
{
    public $modelclass = Idiomauser::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['user_id', 'idioma_id'];
        $query = FilterHelper::applyFilter($request, $campos);

        return IdiomauserResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
                ->paginate($request->perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idiomauser = json_decode($request->getContent(), true);
        $idiomauser = Idiomauser::create($idiomauser);
        return new IdiomauserResource($idiomauser);
    }

    /**
     * Display the specified resource.
     */
    public function show(Idiomauser $idiomauser)
    {
        return new IdiomauserResource($idiomauser);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idiomauser $idiomauser)
    {
        $idiomauserData = json_decode($request->getContent(), true);
        $idiomauser->update($idiomauserData);
        return new IdiomauserResource($idiomauser);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idiomauser $idiomauser)
    {
        $idiomauser->delete();
    }
}
