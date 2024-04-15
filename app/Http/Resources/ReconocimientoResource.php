<?php

namespace App\Http\Resources;

use App\Models\Reconocimiento;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReconocimientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return ($this->resource instanceof Reconocimiento)
            ? array_merge(parent::toArray($request), [
                'ownersId' => [$this->estudiante_id, $this->docente_validador],
            ])
            : parent::toArray($request);
    }
}
