<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
       return $this->belongsToMany(Competencia::class, 'competencias_actividades', 'actividad_id', 'competencia_id');
    }

    public function reconocimientos(): HasMany
    {
        return $this->hasMany(Reconocimiento::class, 'actividad_id');
    }

    public function creador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'docente_id');
    }

}
