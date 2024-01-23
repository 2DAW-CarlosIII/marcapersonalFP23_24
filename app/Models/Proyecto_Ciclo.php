<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto_Ciclo extends Model
{
    use HasFactory;
    protected $fillable = [
        'proyecto_id',
        'ciclo_id',
    ];
    protected $primaryKey =  [
        'proyecto_id',
        'ciclo_id',
    ];
    protected $table = 'proyectos_ciclos';
}
