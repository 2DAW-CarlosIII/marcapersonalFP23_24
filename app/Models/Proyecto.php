<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proyecto extends Model
{
    use HasFactory;

    public static function mejoresProyectos($nProyectos) {
        return self::orderBy('calificacion', 'desc')->take($nProyectos)->get();
    }
}
