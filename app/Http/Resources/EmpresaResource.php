<?php

namespace App\Http\Resources;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return ($this->resource instanceof Empresa)
            ? array_merge(parent::toArray($request), [
                'ownersId' => [$this->user_id],
            ])
            : parent::toArray($request);
    }
}
