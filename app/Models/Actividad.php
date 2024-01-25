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

    public function competencias(): BelongsToMany
    {
       return $this->belongsToMany(Competencias::class, 'competencias_actividades', 'actividad_id', 'competencia_id');
    }
}
