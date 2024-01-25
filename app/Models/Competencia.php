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

    public function actividad(): BelongsToMany
    {
        return $this->belongsToMany(Actividad::class, 'competencias_actividades',
        'id', 'actividad_id', 'competencia_id');
    }

}
