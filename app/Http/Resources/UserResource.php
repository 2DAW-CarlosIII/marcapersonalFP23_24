<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BFI2\DomainResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $jsonToReturn = array_merge(parent::toArray($request), [
            'curriculo' => new CurriculoResource($this->curriculo),
            'idiomas' => $this->getIdiomasFromUser(),
            'actividades' => ActividadResource::collection($this->actividades),
            'proyectos' => ProyectoResource::collection($this->proyectos),
            'competencias' => $this->esEstudiante() ? $this->featuredDomains : [],
            'ciclos' => CicloResource::collection($this->ciclos),
            'attachments' => $this->avatar
                ? [
                    'src' => ('/storage/' . $this->avatar),
                    'title' => $this->nombre
                  ]
                : null,
        ]);

        return ($this->resource instanceof User)
            ? array_merge($jsonToReturn, [
                'ownersId' => [$this->id],
            ])
            : $jsonToReturn;
    }

    public function getIdiomasFromUser() {
      $array_idiomas = IdiomaResource::collection($this->idiomas)->resolve();

        $idiomasTransformados = array_map(function ($idioma) {
          if(array_key_exists('pivot', $idioma)) {
            $idioma['nivel'] = $idioma['pivot']['nivel'];
            $idioma['certificado'] = $idioma['pivot']['certificado'];
            unset($idioma['pivot']);
          }
          return $idioma;
        }, $array_idiomas);

        return $idiomasTransformados;
    }
}
