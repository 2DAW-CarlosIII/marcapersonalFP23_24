<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    public static function mejoresProyectos($nProyectos)
    {
        $nProyectos = Proyecto::orderByDesc('calificacion')->take(5)->get();
        return $nProyectos;
    }
}
