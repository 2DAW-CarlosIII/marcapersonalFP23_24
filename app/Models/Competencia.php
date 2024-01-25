<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Competencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre',
        'color',
    ];

    /**
     * The actividades that belong to the competencia.
    */
    public function actividades(): BelongsToMany
    {
        return $this->belongsToMany(Actividad::class, 'competencias_actividades');
    }
}
