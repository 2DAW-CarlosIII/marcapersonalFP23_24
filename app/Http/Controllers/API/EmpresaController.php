<?php

namespace App\Http\Controllers\API;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmpresaResource;
use App\Mail\EmpresaAccesoRegistrado;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmpresaController extends Controller
{
    public $modelclass = Empresa::class;

     /**
     * Create the controller instance.
     *
     * @return void
    */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show', 'accesoPorToken']);
        $this->authorizeResource(Empresa::class, 'empresa');
    }

    public function index(Request $request)
    {
        $campos = ['nif', 'email'];
        $query = FilterHelper::applyFilter($request, $campos);
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return EmpresaResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $json = json_decode($request->getContent(), true);

        $empresa = Empresa::create($json);

        return new EmpresaResource($empresa);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        return new EmpresaResource($empresa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresa $empresa)
    {
        $empresaData = json_decode($request->getContent(), true);

        $empresa->update($empresaData);

        return new EmpresaResource($empresa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
    }

    public function accesoPorToken($token)
    {
        $empresa = Empresa::where('token', $token)->firstOrFail();
        $usuario = $empresa->user;
        Auth::login($usuario);
        Mail::to($empresa->email)->send(new EmpresaAccesoRegistrado($empresa));
        return redirect(route('home'));
    }
}
