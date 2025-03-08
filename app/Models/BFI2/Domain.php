<?php

namespace App\Models\BFI2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_es',
        'description_en',
        'description_es',
        'formula',
    ];

    /**
     * Get the facets for the domain.
    */
    public function facets(): HasMany
    {
        return $this->hasMany(Facet::class);
    }
}
