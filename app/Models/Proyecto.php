<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'docente_id',
        'nombre',
        'dominio',
        'metadatos',
        'calificacion'
    ];
  
    public static function mejoresProyectos($nProyectos)
    {
        $nProyectos = self::orderByDesc('calificacion')->take(5)->get();
        return $nProyectos;
    }
  
}
