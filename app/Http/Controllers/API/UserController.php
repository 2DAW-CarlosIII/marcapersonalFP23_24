<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public $modelclass = User::class;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['apellidos','nombre','name','email'];
        $query = User::query();
        foreach($campos as $campo){
            $query->orWhere($campo,'like','%' . $request->q . '%');
        }
        return UserResource::collection(
            $query->orderBy($request->_sort ?? 'id', $request->_order ?? 'asc')
            ->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = json_decode($request->getContent(), true);
        $user = User::create($user);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $userData = json_decode($request->getContent(), true);
        $user->update($userData);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
