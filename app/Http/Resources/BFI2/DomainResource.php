<?php

namespace App\Http\Resources\BFI2;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DomainResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        array_merge([
            'nombre' => $this->name_es,
            'facetas' => FacetResource::collection($this->facets),
        ], parent::toArray($request));
    }
}
