<?php

namespace App\Http\Controllers\API;

use App\Helpers\DateFilterHelper;
use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Docente;
use App\Models\Estudiante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $modelclass = User::class;
    /**
     * Create the controller instance.
     *
     * @return void
    */
    public function __construct(Request $request)
    {
        $this->middleware('auth:sanctum')->except(['index', 'getDocentes', 'getEstudiantes', 'show', 'store', 'getPermissions']);
        $this->authorizeResource(User::class, 'user');

        $uri = $request->getRequestUri();

        if (str_contains($uri, 'users')) {
            $this->modelclass = User::class;
        } elseif (str_contains($uri, 'docentes')) {
            $this->modelclass = Docente::class;
        } elseif (str_contains($uri, 'estudiantes')) {
            $this->modelclass = Estudiante::class;
        }
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
     * Display a listing of the teachers.
     */
    public function getDocentes(Request $request)
    {
        return $this->index($request);
    }

    /**
     * Display a listing of the students.
     */
    public function getEstudiantes(Request $request)
    {
        return $this->index($request);
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
        $userAvatar = $request->all();
        if($userRepoAvatar = $request->file('avatar')) {
            $request->validate([
                'avatar' => 'mimes:png,jpg,jpeg|max:5120', // Se permiten imagenes de hasta 5 MB
            ], [
                'avatar.mimes' => 'El avatar debe ser una imagen.',
                'avatar.max' => 'El tamaño del avatar no debe ser mayor a 5 MB.',
            ]);

            $path = $userRepoAvatar->store('userAvatar', ['disk' => 'public']);
            $userAvatar['avatar'] = $path;
        } else {
            $userAvatar['avatar'] = $user->avatar;
        }
        $user->update($userAvatar);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    }

    public function getPermissions()
    {
        $user = Auth::user();
        return response()->json($user ? $user->getAllPermissions() : []);
    }
}
