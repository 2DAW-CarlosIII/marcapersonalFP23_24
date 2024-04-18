<?php

namespace App\Http\Resources;

use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParticipanteProyectoResource extends JsonResource
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
            'estudiante' => User::find($this->estudiante_id),
        ]);

        return array_merge($jsonToReturn, [
                'ownersId' => [$proyecto->docente_id],
                'id' => $this->proyecto_id * 1000 + $this->estudiante_id,
            ]);
    }
}
