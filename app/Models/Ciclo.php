<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ciclo extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'codCiclo',
        'codFamilia',
        'familia_id',
        'grado',
        'nombre'
    ];

    /**
     * Get the familia_profesional that owns the ciclo.
    */
    public function familiaProfesional(): BelongsTo
    {
        return $this->belongsTo(FamiliaProfesional::class, 'familia_id');
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_ciclos','user_id', 'ciclo_id');
    }
}
