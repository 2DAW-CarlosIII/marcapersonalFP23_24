<?php

namespace App\Http\Resources;

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
        $array_idiomas = IdiomaResource::collection($this->idiomas)->resolve();

        $idiomasTransformados = array_map(function ($idioma) {
            unset($idioma['pivot']['idioma_id']);
            unset($idioma['pivot']['user_id']);
            $pivot = $idioma['pivot'];
            unset($idioma['pivot']);
            return array_merge($idioma, $pivot);
        }, $array_idiomas);


        return array_merge(parent::toArray($request), [
            'curriculo' => new CurriculoResource($this->curriculo),
            'idiomas' => $idiomasTransformados,
        ]);
    }
}
