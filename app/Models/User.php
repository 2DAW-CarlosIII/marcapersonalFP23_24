<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nombre',
        'apellidos',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * the curriculo associated with the user.
     */
    public function curriculo(): HasOne
    {
        return $this->hasOne(Curriculo::class);
    }

    /**
     * The idiomas that belong to the user.
     */
    public function idiomas(): BelongsToMany
    {
        return $this->belongsToMany(Idioma::class, 'users_idiomas', 'user_id', 'idioma_id')
            ->withPivot(['nivel', 'certificado']);
    }

    public function proyectos(): BelongsToMany
    {
        return $this->belongsToMany(Proyecto::class, 'participantes_proyectos', 'estudiante_id', 'proyecto_id');
    }

    public function competencias(): BelongsToMany
    {
        return $this->belongsToMany(Competencia::class, 'users_competencias', 'user_id', 'competencia_id')->withPivot('docente_validador');
    }

    /**
     * Get the actividades for the user.
    */

    public function actividades(): HasManyThrough
    {
        return $this->hasManyThrough(Actividad::class, Reconocimiento::class, 'estudiante_id', 'id', 'id', 'actividad_id');
    }

    /**
     * Get the reconocimientos for the user.
    */

    public function reconocimientos(): HasMany
    {
        return $this->hasMany(Reconocimiento::class, 'id');
    }

    public function ciclos(): BelongsToMany
    {
        return $this->belongsToMany(Ciclo::class, 'users_ciclos', 'user_id', 'ciclo_id');
    }

    public function actividadesPropuestas(): HasMany
    {
        return $this->hasMany(Actividad::class, 'docente_id', 'id');
    }

    // Gestión de roles
    public function esAdmin(): bool
    {
        return $this->email === env('ADMIN_EMAIL');
    }

    public function esDocente(): bool
    {
        return $this->getEmailDomain() === env('TEACHER_EMAIL_DOMAIN');
    }

    public function esEstudiante(): bool
    {
        return $this->getEmailDomain() === env('STUDENT_EMAIL_DOMAIN');
    }

    public function esPropietario($recurso, $propiedad = 'user_id'): bool
    {
        return $recurso && $recurso->$propiedad === $this->id;
    }

    private function getEmailDomain(): string
    {
        $dominio = explode('@', $this->email)[1];
        return $dominio;
    }

}
