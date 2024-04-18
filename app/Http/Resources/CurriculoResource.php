<?php

namespace App\Http\Resources;

use App\Models\Curriculo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurriculoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $jsonToReturn = array_merge(parent::toArray($request), [
            'attachments' => $this->pdf_curriculum
                ? [
                    'src' => ('/storage/' . $this->pdf_curriculum),
                    'title' => User::find($this->id)->nombre . '.pdf'
                ]
                : null,
        ]);

        return ($this->resource instanceof Curriculo)
            ? array_merge($jsonToReturn, [
                'ownersId' => [$this->user_id],
            ])
            : $jsonToReturn;
    }
}
