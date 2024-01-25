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
            'ciclos' => CicloResource::collection($this->ciclos),
            'estudiantes' => $this->users()->get(),
            'docente_nombre' => $this->docente ? $this->docente->name : null,
        ]);
    }
}
