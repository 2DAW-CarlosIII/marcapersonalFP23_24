<?php

namespace App\Http\Controllers\API;

use App\Helpers\DateFilterHelper;
use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class UserController extends Controller
{
    public $modelclass = User::class;
    /**
     * Create the controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show', 'store']);
        $this->authorizeResource(User::class, 'user');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['apellidos', 'nombre', 'name', 'email'];
        $date_filters = ['created_at', 'hasta_at'];
        $query = FilterHelper::applyFilter($request, $campos);
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return UserResource::collection($queryOrdered->paginate($request->perPage));
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
        $userData = $request->all();
        if($userRepoAvatar = $request->file('avatar')) {
            /*
            $request->validate([
                'fichero' => 'mimes:png,jpg,jpeg,webp|max:10240', // Se permiten avatares de hasta 10 MB
            ], [
                'fichero.mimes' => 'El avatar debe ser una foto png, jpg, jpeg o webp.',
                'fichero.max' => 'El tamaño del avatar no debe ser mayor a 10 MB.',
            ]);*/

            $path = $userRepoAvatar->store('repoAvatars', ['disk' => 'public']);
            $userData['avatar'] = $path;
        } else {
            $userData['avatar'] = $user->avatar;
        }

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
