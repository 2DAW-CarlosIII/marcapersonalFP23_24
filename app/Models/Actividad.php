<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'actividades';

    protected $fillable = [
        'docente_id',
        'nombre',
        'insignia',
    ];

    /**
     * The competencias that belong to the actividad.
    */
    public function competencias(): BelongsToMany
    {
        return $this->belongsToMany(Competencia::class, 'competencias_actividades');
    }
}
