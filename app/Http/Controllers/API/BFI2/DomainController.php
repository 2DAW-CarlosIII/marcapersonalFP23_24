<?php

namespace App\Http\Controllers\API\BFI2;

use App\Helpers\FilterHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\BFI2\DomainResource;
use App\Models\BFI2\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
        $this->authorizeResource(Domain::class, 'domain');
    }

    public $modelclass = Domain::class;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campos = ['name_es', 'name_en', 'description_es', 'description_en', 'formula'];
        $query = FilterHelper::applyFilter($request, $campos);
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return DomainResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $domain = json_decode($request->getContent(), true);

        $domain = Domain::create($domain);

        return new DomainResource($domain);
    }

    /**
     * Display the specified resource.
     */
    public function show(Domain $domain)
    {
        return new DomainResource($domain);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Domain $domain)
    {
        $domainData = json_decode($request->getContent(), true);
        $domain->update($domainData);

        return new DomainResource($domain);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();
    }
}
