<?php

namespace App\Http\Controllers\API\BFI2;

use App\Http\Controllers\Controller;
use App\Http\Resources\BFI2\FacetResource;
use App\Models\BFI2\Facet;
use Illuminate\Http\Request;
use App\Helpers\FilterHelper;

class FacetController extends Controller
{
    public $modelclass = Facet::class;
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth:sanctum')->except(['index', 'show']);
         $this->authorizeResource(Facet::class, 'facet');
     }

    public function index(Request $request)
    {
        $campos = ['name_es', 'name_en', 'description_es', 'description_en', 'formula'];
        $otrosFiltros = ['domain_id'];
        $query = FilterHelper::applyFilter($request, $campos, $otrosFiltros);
        $request->attributes->set('total_count', $query->count());
        $queryOrdered = FilterHelper::applyOrder($query, $request);
        return FacetResource::collection($queryOrdered->paginate($request->perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $facet = json_decode($request->getContent(), true);

        $facet = Facet::create($facet);

        return new FacetResource($facet);
    }

    /**
     * Display the specified resource.
     */
    public function show(Facet $facet)
    {
        return new FacetResource($facet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facet $facet)
    {
        $facetData = json_decode($request->getContent(), true);
        $facet->update($facetData);

        return new FacetResource($facet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facet $facet)
    {
        $facet->delete();
    }
}
