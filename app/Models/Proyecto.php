<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    public static function mejoresProyectos($nProyectos)
    {
        return static::orderBy('calificacion', 'desc')->take($nProyectos)->get();
    }
}
