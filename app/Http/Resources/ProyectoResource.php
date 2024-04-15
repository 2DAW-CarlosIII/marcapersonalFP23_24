<?php

namespace App\Http\Resources;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProyectoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $jsonToReturn = array_merge(parent::toArray($request), [
            'ownersId' => array_merge($this->users->pluck('id')->toArray(), [$this->docente_id]),
            'tutor' => $this->docente ? $this->docente->nombre . " " . $this->docente->apellidos : null,
            'ciclos' => CicloResource::collection($this->ciclos),
            'estudiantes' => $this->users()->get(),
            'attachments' => $this->fichero
                ? [
                    'src' => ('/storage/' . $this->fichero),
                    'title' => $this->nombre
                  ]
                : null,
        ]);

        return ($this->resource instanceof Proyecto)
            ? array_merge($jsonToReturn, [
                'ownersId' => array_merge($this->users->pluck('id')->toArray(), [$this->docente_id]),
            ])
            : $jsonToReturn;
    }
}
