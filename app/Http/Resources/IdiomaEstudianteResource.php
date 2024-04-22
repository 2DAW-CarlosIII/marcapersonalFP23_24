<?php

namespace App\Http\Resources;

use App\Models\Estudiante;
use App\Models\Idioma;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IdiomaEstudianteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $estudiante = Estudiante::find($this->user_id);
        $jsonToReturn = array_merge(parent::toArray($request), [
            'estudiante' => $estudiante,
            'idioma' => Idioma::find($this->idioma_id),
        ]);

        return array_merge($jsonToReturn, [
                'ownersId' => [$this->user_id],
                'id' => $this->user_id * 1000 + $this->idioma_id,
            ]);
    }
}
