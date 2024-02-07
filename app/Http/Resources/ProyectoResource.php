<?php

namespace App\Http\Resources;

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
        return array_merge(parent::toArray($request), [
            'tutor' => $this->docente ? $this->docente->nombre . " " . $this->docente->apellidos : null,
            'ciclos' => CicloResource::collection($this->ciclos),
            'estudiantes' => $this->users()->get(),
            'fichero' => $this->fichero
                ? ['src' => ('storage/' . $this->fichero)]
                : null,
        ]);
    }
}
