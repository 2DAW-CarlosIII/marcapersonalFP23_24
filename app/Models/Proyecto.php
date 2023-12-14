<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    /**
     * Este método se encarga de obtener una lista de
     * un número de los mejores proyectos
     */
    public static function mejoresProyectos($cantidadDeProyectos){
        return Proyecto::orderBy("calificacion", "desc")->take($cantidadDeProyectos)->get();
    }
}
