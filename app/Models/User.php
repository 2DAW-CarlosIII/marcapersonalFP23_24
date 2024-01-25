<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * Get the curriculo associated with the user.
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

    public function proyectos() : BelongsToMany {
        return $this->belongsToMany(Proyecto::class,"participantes_proyectos","estudiante_id","proyecto_id");
    }
}
