<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'docente_id',
        'dominio',
        'metadatos',
        'calificacion'
    ];

    public static function mejoresProyectos($nProyectos)
    {
        $nProyectos = self::orderByDesc('calificacion')->take(5)->get();
        return $nProyectos;
    }
    public static function contarProyectos(){
        $proyectos = self::all()->count();
        return $proyectos;
    }
    /**
     * The users that belong to the idioma.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'participantes_proyectos' );

    }
}
