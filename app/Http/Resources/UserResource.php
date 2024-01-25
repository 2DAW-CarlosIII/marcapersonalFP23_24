<?php

namespace App\Http\Resources;

use App\Models\UserCompetencia;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_merge(parent::toArray($request), [
            'curriculo' => new CurriculoResource($this->curriculo),
            'idiomas' => IdiomaResource::collection($this->idiomas),
            'creador' => ActividadResource::collection($this->actividades),
            'proyectos' => ProyectoResource::collection($this->proyectos),
            'competencias' => CompetenciaResource::collection($this->competencias),
            'ciclos' => CicloResource::collection($this->ciclos),
        ]);
    }
}
