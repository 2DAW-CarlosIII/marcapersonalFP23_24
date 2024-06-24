<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CicloProyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'ciclo_id',
        'proyecto_id',
    ];

    protected $table = 'proyectos_ciclos';

    protected $primaryKey =  [
        'ciclo_id',
        'proyecto_id',
    ];

    public $incrementing = false;
}
