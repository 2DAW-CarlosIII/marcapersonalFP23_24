<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto_Ciclo extends Model
{
    use HasFactory;
    protected $primaykey = [
        'proyecto_id',
        'ciclo_id',
    ];
    protected $table = 'proyectos_ciclos';
}
