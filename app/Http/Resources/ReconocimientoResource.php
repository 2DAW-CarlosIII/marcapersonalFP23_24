<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReconocimientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
/*
    public function validarReconocimiento($reconocimiento, $user){
        if($user->esAdmin()) return true;
        if($user->esDocente() && $reconocimiento->docente_validador == null) return true;
        return false;

    }*/
}
