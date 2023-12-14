<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Proyecto extends Model
{
    static function mejoresProyectos($num){
        $consulta=DB::select("SELECT * FROM proyectos ORDER BY calificacion DESC LIMIT $num;");
        return $consulta;
    }

    use HasFactory;
}
