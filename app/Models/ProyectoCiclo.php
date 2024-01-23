<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoCiclo extends Model
{
    use HasFactory;
    protected $table = 'proyectos_ciclos';
    protected $fillable = ['proyecto_id', 'ciclo_id'];
    protected $primaryKey =  [
        'proyecto_id',
        'ciclo_id',
    ];
    public $incrementing = false;
}
