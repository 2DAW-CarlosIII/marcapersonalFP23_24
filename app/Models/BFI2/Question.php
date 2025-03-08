<?php

namespace App\Models\BFI2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'facet_id',
        'text_en',
        'text_es',
    ];

    protected $table = 'questions';

    /**
     * Get the facet that owns the domain.
    */
    public function facet(): BelongsTo
    {
        return $this->belongsTo(Facet::class);
    }
}
