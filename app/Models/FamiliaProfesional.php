<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FamiliaProfesional extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'codigo',
        'nombre',
    ];
    protected $table = 'familias_profesionales';

    /**
     * Get the ciclos for the familia_profesional.
    */
    public function ciclos(): HasMany
    {
        return $this->hasMany(Ciclo::class, 'familia_id');
    }
}
