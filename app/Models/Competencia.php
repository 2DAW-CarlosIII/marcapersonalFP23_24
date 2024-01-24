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
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_competencias')
        ->withPivot('docente_validador');
    }
}
