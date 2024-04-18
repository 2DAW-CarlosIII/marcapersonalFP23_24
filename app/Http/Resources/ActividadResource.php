<?php

namespace App\Http\Resources;

use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActividadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $jsonToReturn = array_merge(parent::toArray($request), [
            'reconocimientos' => new ReconocimientoResource($this->reconocimientos),
            'competencias' => CompetenciaResource::collection($this->competencias),
        ]);

        return ($this->resource instanceof Actividad)
            ? array_merge($jsonToReturn, [
                'ownersId' => [$this->docente_id],
            ])
            : $jsonToReturn;

    }
}
