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
        return $this->belongsToMany(User::class, 'users_competencias')->withPivot('docente_validador');
    }

    public function actividades(): BelongsToMany
    {
       return $this->belongsToMany(Actividad::class, 'competencias_actividades');
    }

    public function esAdmin(): bool
    {
        return $this->email === env('ADMIN_EMAIL');
    }

    public function esEstudiante(): bool
    {
        return $this->getEmailDomain() === env('STUDENT_EMAIL_DOMAIN');
    }

    public function esPropietario($recurso, $propiedad = 'user_id'): bool
    {
        return $recurso && $recurso->$propiedad === $this->id;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function competencia()
    {
        return $this->belongsTo(Competencia::class);
    }
}
