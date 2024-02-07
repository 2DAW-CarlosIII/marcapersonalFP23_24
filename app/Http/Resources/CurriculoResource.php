<?php

namespace App\Http\Resources;

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
        return array_merge(parent::toArray($request), [
            'attachments' => $this->pdf_curriculo
                ? [
                    'src' => ('/storage/' . $this->pdf_curriculo),
                    'title' => $this->user_id + 1 . "_PDFCurriculo.pdf"
                ]
                : null,
        ]);
    }
}
