<?php

namespace App\Http\Resources;

use App\Models\Proyecto;
use App\Models\Ciclo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CicloProyectoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $proyecto = Proyecto::find($this->proyecto_id);
        $jsonToReturn = array_merge(parent::toArray($request), [
            'proyecto' => $proyecto,
            'ciclo' => Ciclo::find($this->ciclo_id),
        ]);

        return array_merge($jsonToReturn, [
                'ownersId' => [$proyecto->docente_id],
                'id' => $this->proyecto_id * 1000 + $this->ciclo_id,
            ]);
    }
}
