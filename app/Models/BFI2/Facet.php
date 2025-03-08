<?php

namespace App\Models\BFI2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Facet extends Model
{
    use HasFactory;

    protected $fillable = [
        'domain_id',
        'name_en',
        'name_es',
        'description_en',
        'description_es',
        'formula',
    ];

    /**
     * Get the domain that owns the facet.
    */
    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }
}
